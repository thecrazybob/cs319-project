<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Support extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Support::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static function label()
    {
        return 'Support Tickets';
    }

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
            BelongsTo::make('Department')->sortable(),
            BelongsTo::make('Patient')->sortable(),
            HasMany::make('Support Messages')->sortable(),
            Select::make('Status')->sortable()->options([
                'new'      => 'New',
                'answered' => 'Answered',
                'closed'   => 'Closed',
                'awaiting' => 'Awaiting',
                'hold'     => 'Hold',
                'reopened' => 'Reopened',
            ])->onlyOnForms()->required(),
            Badge::make('Status')->addTypes([
                'new' => 'whitespace-nowrap px-2 py-1 rounded-full uppercase text-xs font-bold text-dark dark:text-white',
            ])->map([
                'new'      => 'new',
                'answered' => 'info',
                'closed'   => 'success',
                'awaiting' => 'danger',
                'hold'     => 'warning',
                'reopened' => 'warning',
            ])->sortable(),
            Text::make('Priority')->sortable()->displayUsing(function ($priortiy) {
                $converted = Str::of($priortiy)->studly();

                return  $converted;
            })->onlyOnIndex(),
            Select::make('Priority')->sortable()->options([
                'low'      => 'Low',
                'medium'   => 'Medium',
                'high'     => 'High',
                'critical' => 'Critical',
            ])->required()->onlyOnForms(),
            Text::make('Subject')->sortable(),
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
