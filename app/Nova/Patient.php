<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Patient extends Resource
{
    public function title()
    {
        return \App\Models\User::where('id', $this->user_id)->first()->name;
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Patient::class;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Bilkent Id')->sortable()->required(),
            BelongsTo::make('User')->sortable()->showCreateRelationButton(),
            Date::make('Birth Date')->sortable()->required(),
            Text::make('Gender')->sortable()->displayUsing(function ($gender) {
                $converted = Str::of($gender)->studly();

                return  $converted;
            })->onlyOnIndex(),
            Select::make('Gender')->options(['female' => 'Female', 'male' => 'Male', 'other' => 'Other'])->onlyOnForms()->required(),
            Number::make('Height')->min(50)->max(300)->step(0.1)->sortable()->required(),
            Number::make('Weight')->min(1)->max(1000)->step(0.1)->sortable()->required(),
            Textarea::make('Allergies')->required(),
            Textarea::make('Operations')->required(),
            Textarea::make('Other Illness')->required(),
            Textarea::make('Current Medications')->required(),
            Boolean::make('Smoking'),
            Date::make('Created At')->sortable()->onlyOnDetail(),
            Date::make('Updated At')->sortable()->onlyOnDetail(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
