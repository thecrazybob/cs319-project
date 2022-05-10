<?php

namespace Laravel\Nova\Metrics;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Nova;

abstract class Value extends RangedMetric
{
    use RoundingPrecision;

    /**
     * The element's component.
     *
     * @var string
     */
    public $component = 'value-metric';

    /**
     * The element's icon.
     *
     * @var string
     */
    public $icon = 'chart-bar';

    /**
     * Set the icon for the metric.
     *
     * @param  string  $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Return a value result showing the growth of an count aggregate over time.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  \Illuminate\Database\Query\Expression|string|null  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function count($request, $model, $column = null, $dateColumn = null)
    {
        return $this->aggregate($request, $model, 'count', $column, $dateColumn);
    }

    /**
     * Return a value result showing the growth of an average aggregate over time.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  \Illuminate\Database\Query\Expression|string  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function average($request, $model, $column, $dateColumn = null)
    {
        return $this->aggregate($request, $model, 'avg', $column, $dateColumn);
    }

    /**
     * Return a value result showing the growth of a sum aggregate over time.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  \Illuminate\Database\Query\Expression|string  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function sum($request, $model, $column, $dateColumn = null)
    {
        return $this->aggregate($request, $model, 'sum', $column, $dateColumn);
    }

    /**
     * Return a value result showing the growth of a maximum aggregate over time.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  \Illuminate\Database\Query\Expression|string  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function max($request, $model, $column, $dateColumn = null)
    {
        return $this->aggregate($request, $model, 'max', $column, $dateColumn);
    }

    /**
     * Return a value result showing the growth of a minimum aggregate over time.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  \Illuminate\Database\Query\Expression|string  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function min($request, $model, $column, $dateColumn = null)
    {
        return $this->aggregate($request, $model, 'min', $column, $dateColumn);
    }

    /**
     * Return a value result showing the growth of a model over a given time frame.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder|class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  string  $function
     * @param  \Illuminate\Database\Query\Expression|string|null  $column
     * @param  string|null  $dateColumn
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    protected function aggregate($request, $model, $function, $column = null, $dateColumn = null)
    {
        $query = $model instanceof Builder ? $model : (new $model)->newQuery();

        $query->tap(function ($query) use ($request) {
            return $this->applyFilterQuery($request, $query);
        });

        $column = $column ?? $query->getModel()->getQualifiedKeyName();

        if ($request->range === 'ALL') {
            return $this->result(
                round(
                    with(clone $query)->{$function}($column),
                    $this->roundingPrecision,
                    $this->roundingMode
                )
            );
        }

        $dateColumn = $dateColumn ?? $query->getModel()->getQualifiedCreatedAtColumn();
        $timezone = Nova::resolveUserTimezone($request) ?? $this->getDefaultTimezone($request);

        $previousValue = round(
            with(clone $query)->whereBetween(
                $dateColumn, $this->formatQueryDateBetween($this->previousRange($request->range, $timezone))
            )->{$function}($column) ?? 0,
            $this->roundingPrecision,
            $this->roundingMode
        );

        return $this->result(
            round(
                with(clone $query)->whereBetween(
                    $dateColumn, $this->formatQueryDateBetween($this->currentRange($request->range, $timezone))
                )->{$function}($column) ?? 0,
                $this->roundingPrecision,
                $this->roundingMode
            )
        )->previous($previousValue);
    }

    /**
     * Calculate the previous range and calculate any short-cuts.
     *
     * @param  string|int  $range
     * @param  string  $timezone
     * @return array<int, \Carbon\CarbonImmutable>
     */
    protected function previousRange($range, $timezone)
    {
        if ($range == 'TODAY') {
            return [
                CarbonImmutable::now($timezone)->modify('yesterday')->setTime(0, 0),
                CarbonImmutable::today($timezone)->subSecond(),
            ];
        }

        if ($range == 'MTD') {
            return [
                CarbonImmutable::now($timezone)->modify('first day of previous month')->setTime(0, 0),
                CarbonImmutable::now($timezone)->firstOfMonth()->subSecond(),
            ];
        }

        if ($range == 'QTD') {
            return $this->previousQuarterRange($timezone);
        }

        if ($range == 'YTD') {
            return [
                CarbonImmutable::now($timezone)->subYears(1)->firstOfYear()->setTime(0, 0),
                CarbonImmutable::now($timezone)->firstOfYear()->subSecond(),
            ];
        }

        return [
            CarbonImmutable::now($timezone)->subDays($range * 2),
            CarbonImmutable::now($timezone)->subDays($range)->subSecond(),
        ];
    }

    /**
     * Calculate the previous quarter range.
     *
     * @param  string  $timezone
     * @return array<int, \Carbon\CarbonImmutable>
     */
    protected function previousQuarterRange($timezone)
    {
        return [
            CarbonImmutable::firstDayOfPreviousQuarter($timezone),
            CarbonImmutable::firstDayOfQuarter($timezone)->subSecond(),
        ];
    }

    /**
     * Calculate the current range and calculate any short-cuts.
     *
     * @param  string|int  $range
     * @param  string  $timezone
     * @return array<int, \Carbon\CarbonImmutable>
     */
    protected function currentRange($range, $timezone)
    {
        if ($range == 'TODAY') {
            return [
                CarbonImmutable::today($timezone),
                CarbonImmutable::now($timezone),
            ];
        }

        if ($range == 'MTD') {
            return [
                CarbonImmutable::now($timezone)->firstOfMonth(),
                CarbonImmutable::now($timezone),
            ];
        }

        if ($range == 'QTD') {
            return $this->currentQuarterRange($timezone);
        }

        if ($range == 'YTD') {
            return [
                CarbonImmutable::now($timezone)->firstOfYear(),
                CarbonImmutable::now($timezone),
            ];
        }

        return [
            CarbonImmutable::now($timezone)->subDays($range),
            CarbonImmutable::now($timezone),
        ];
    }

    /**
     * Calculate the previous quarter range.
     *
     * @param  string  $timezone
     * @return array<int, \Carbon\CarbonImmutable>
     */
    protected function currentQuarterRange($timezone)
    {
        return [
            CarbonImmutable::firstDayOfQuarter($timezone),
            CarbonImmutable::now($timezone),
        ];
    }

    /**
     * Create a new value metric result.
     *
     * @param  int|float|numeric-string|null  $value
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    public function result($value)
    {
        return new ValueResult($value);
    }

    /**
     * Get default timezone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    private function getDefaultTimezone($request)
    {
        return $request->timezone ?? config('app.timezone');
    }

    /**
     * Prepare the metric for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'icon' => $this->icon,
        ]);
    }
}
