<?php

namespace Laravel\Nova\Fields;

use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * @property array $fieldDependencies
 */
trait DependentFields
{
    /**
     * Sync depends on logic.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return $this
     */
    public function syncDependsOn(NovaRequest $request)
    {
        $this->value = null;
        $this->defaultCallback = null;

        return $this->applyDependsOn($request);
    }

    /**
     * Apply depends on logic.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return $this
     */
    public function applyDependsOn(NovaRequest $request)
    {
        collect($this->fieldDependencies ?? [])
            ->transform(function ($dependsOn) use ($request) {
                $mixin = $dependsOn['mixin'];

                if (is_string($mixin) && class_exists($mixin)) {
                    $mixin = new $mixin();
                }

                return [
                    'mixin' => $mixin,
                    'attributes' => FormData::onlyFrom($request, $dependsOn['attributes']),
                ];
            })
            ->each(function ($dependsOn) use ($request) {
                $dependsOn['mixin'](
                    $this, $request, $dependsOn['attributes']
                );
            });

        return $this;
    }

    /**
     * Get depends on attributes.
     *
     * @return array<int, string>
     */
    protected function getDependentsAttributes()
    {
        return collect($this->fieldDependencies ?? [])->map(function ($dependsOn) {
            return $dependsOn['attributes'];
        })->flatten()->unique()->all();
    }
}
