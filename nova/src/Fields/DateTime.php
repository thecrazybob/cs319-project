<?php

namespace Laravel\Nova\Fields;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Exception;
use Illuminate\Support\Arr;
use Laravel\Nova\Contracts\FilterableField;
use Laravel\Nova\Fields\Filters\DateFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class DateTime extends Field implements FilterableField
{
    use FieldFilterable, SupportsDependentFields;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'date-time-field';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|\Closure|callable|object|null  $attribute
     * @param  (callable(mixed, mixed, ?string):mixed)|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value, $request) {
            if (! is_null($value)) {
                if ($value instanceof DateTimeInterface) {
                    return $value instanceof CarbonInterface
                                ? $value->toIso8601String()
                                : $value->format(DateTimeInterface::ATOM);
                }

                throw new Exception("DateTime field must cast to 'datetime' in Eloquent model.");
            }
        });
    }

    /**
     * Resolve the default value for the field.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return string
     */
    protected function resolveDefaultValue(NovaRequest $request)
    {
        $value = parent::resolveDefaultValue($request);

        if ($value instanceof DateTimeInterface) {
            return $value instanceof CarbonInterface
                        ? $value->toIso8601String()
                        : $value->format(DateTimeInterface::ATOM);
        }

        return $value;
    }

    /**
     * Make the field filter.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Laravel\Nova\Fields\Filters\Filter
     */
    protected function makeFilter(NovaRequest $request)
    {
        return new DateFilter($this);
    }

    /**
     * Define the default filterable callback.
     *
     * @return callable(\Laravel\Nova\Http\Requests\NovaRequest, \Illuminate\Database\Eloquent\Builder, mixed, string):\Illuminate\Database\Eloquent\Builder
     */
    protected function defaultFilterableCallback()
    {
        return function (NovaRequest $request, $query, $value, $attribute) {
            [$min, $max] = $value;

            if (! is_null($min) && ! is_null($max)) {
                return $query->whereDate($attribute, '>=', $min)
                             ->whereDate($attribute, '<=', $max);
            } elseif (! is_null($min)) {
                return $query->whereDate($attribute, '>=', $min);
            }

            return $query->whereDate($attribute, '<=', $max);
        };
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array
     */
    public function serializeForFilter()
    {
        return transform($this->jsonSerialize(), function ($field) {
            return Arr::only($field, [
                'uniqueKey',
                'name',
                'attribute',
                'type',
                'placeholder',
                'extraAttributes',
            ]);
        });
    }
}
