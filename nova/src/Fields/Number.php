<?php

namespace Laravel\Nova\Fields;

use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Filters\NumberFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Number extends Text
{
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
        parent::__construct($name, $attribute, $resolveCallback);

        $this->textAlign(Field::RIGHT_ALIGN)
            ->withMeta(['type' => 'number']);
    }

    /**
     * The minimum value that can be assigned to the field.
     *
     * @param  mixed  $min
     * @return $this
     */
    public function min($min)
    {
        return $this->withMeta(['min' => $min]);
    }

    /**
     * The maximum value that can be assigned to the field.
     *
     * @param  mixed  $max
     * @return $this
     */
    public function max($max)
    {
        return $this->withMeta(['max' => $max]);
    }

    /**
     * The step size the field will increment and decrement by.
     *
     * @param  mixed  $step
     * @return $this
     */
    public function step($step)
    {
        return $this->withMeta(['step' => $step]);
    }

    /**
     * Make the field filter.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Laravel\Nova\Fields\Filters\Filter
     */
    protected function makeFilter(NovaRequest $request)
    {
        return new NumberFilter($this);
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
                return $query->whereBetween($attribute, [$min, $max]);
            } elseif (! is_null($min)) {
                return $query->where($attribute, '>=', $min);
            }

            return $query->where($attribute, '<=', $max);
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
                'min',
                'max',
                'step',
                'pattern',
                'placeholder',
                'extraAttributes',
            ]);
        });
    }
}
