<?php

namespace Laravel\Nova\Fields;

use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Filters\StatusFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Status extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'status-field';

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * Indicate if field require explicit filterable callback.
     *
     * @var bool
     */
    public $requiresExplicitFilterableCallback = true;

    /**
     * Specify the values that should be considered "loading".
     *
     * @param  array<int, string>  $loadingWords
     * @return $this
     */
    public function loadingWhen(array $loadingWords)
    {
        return $this->withMeta(['loadingWords' => $loadingWords]);
    }

    /**
     * Specify the values that should be considered "failed".
     *
     * @param  array<int, string>  $failedWords
     * @return $this
     */
    public function failedWhen(array $failedWords)
    {
        return $this->withMeta(['failedWords' => $failedWords]);
    }

    /**
     * Make the field filter.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Laravel\Nova\Fields\Filters\Filter
     */
    protected function makeFilter(NovaRequest $request)
    {
        return new StatusFilter($this);
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
                'options',
            ]);
        });
    }
}
