<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class SupportMessage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\SupportMessage::class;

    public static $displayInNavigation = false;

    public static function label()
    {
        return 'Ticket Messages';
    }

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
            ID::make()->sortable()->hide(),
            Text::make('Message')
                ->onlyOnIndex()
                ->displayUsing(function ($text) {
                    if (strlen($text) > 50) {
                        return substr($text, 0, 50).'...';
                    }

                    return $text;
                })
                ->sortable(),
            Date::make('Created At')->sortable(),
            Textarea::make('Message')->alwaysShow()->required(),
            Hidden::make('User', 'user_id')->default(function ($request) {
                return $request->user()->id;
            }),
            Hidden::make('Support', 'support_id')->default(function ($request) {
                return $request->resourceId;
            }),

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
