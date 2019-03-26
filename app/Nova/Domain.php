<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Domain extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Domain';

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['registrar', 'dns', 'website', 'mail'];

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            // Text::make('Registrar_id', 'registrar_id.name')
            //     ->sortable(),
            // HasOne::make('Service', 'registrar_id'),
            BelongsTo::make('Customer')->searchable(),
            BelongsTo::make('Registrar', 'registrar', 'App\Nova\Service'),
            BelongsTo::make('DNS', 'dns', 'App\Nova\Service'),
            BelongsTo::make('Website', 'website', 'App\Nova\Service'),
            BelongsTo::make('E-Mail', 'mail', 'App\Nova\Service'),

            new Panel('Hosting Infosheet', [
                File::make('Infosheet')
                    ->disk('local')
                    ->storeOriginalName('infosheet_name')
                    ->storeSize('infosheet_size'),

                Text::make('Infosheet Name')
                    ->exceptOnForms()
                    ->hideFromIndex(),

                Text::make('Infosheet Size')
                    ->exceptOnForms()
                    ->hideFromIndex()
                    ->displayUsing(function ($value) {
                        return number_format($value / 1024, 2) . 'kb';
                    }),
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
