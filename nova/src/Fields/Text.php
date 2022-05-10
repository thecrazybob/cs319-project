<?php

namespace Laravel\Nova\Fields;

use Illuminate\Support\Arr;
use Laravel\Nova\Contracts\FilterableField;
use Laravel\Nova\Fields\Filters\TextFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Text extends Field implements FilterableField
{
    use FieldFilterable, SupportsDependentFields;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-field';

    /**
     * The field's suggestions callback.
     *
     * @var array|callable
     */
    public $suggestions;

    /**
     * Set the callback or array to be used to determine the field's suggestions list.
     *
     * @param  array|callable  $suggestions
     * @return $this
     */
    public function suggestions($suggestions)
    {
        $this->suggestions = $suggestions;

        return $this;
    }

    /**
     * Resolve the display suggestions for the field.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function resolveSuggestions(NovaRequest $request)
    {
        if (is_callable($this->suggestions)) {
            return call_user_func($this->suggestions, $request) ?? null;
        }

        return $this->suggestions;
    }

    /**
     * Display the field as raw HTML using Vue.
     *
     * @return $this
     */
    public function asHtml()
    {
        return $this->withMeta(['asHtml' => true]);
    }

    /**
     * Make the field filter.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Laravel\Nova\Fields\Filters\Filter
     */
    protected function makeFilter(NovaRequest $request)
    {
        return new TextFilter($this);
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array
     */
    public function serializeForFilter()
    {
        return transform($this->jsonSerialize(), function ($field) {
            $field['suggestions'] = $field['suggestions'] ?? $this->resolveSuggestions(app(NovaRequest::class));

            return Arr::only($field, [
                'uniqueKey',
                'name',
                'attribute',
                'suggestions',
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

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $request = app(NovaRequest::class);

        if ($request->isCreateOrAttachRequest()
            || $request->isUpdateOrUpdateAttachedRequest()
            || $request->isActionRequest() === true
        ) {
            return array_merge(parent::jsonSerialize(), [
                'suggestions' => $this->resolveSuggestions($request),
            ]);
        }

        return parent::jsonSerialize();
    }
}
