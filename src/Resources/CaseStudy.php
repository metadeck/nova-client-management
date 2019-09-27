<?php

namespace Metadeck\NovaClientManager\Resources;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Advoor\NovaEditorJs\NovaEditorJs;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

use Laravel\Nova\Resource;
use Metadeck\ClientManager\Models\CaseStudy as CaseStudyModel;


class CaseStudy extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = CaseStudyModel::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Client Management';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            ID::make()->sortable(),

            BelongsTo::make('Client', 'client', Client::class),

            Text::make('Title'),

            Images::make('Featured Image', 'featured_image')
                ->croppingConfigs(['ratio' => 16/9])
                ->rules(['required']),

            Images::make('Screenshots', 'screenshots'),

            NovaEditorJs::make('Content'),

            NovaEditorJs::make('Preview Content', 'preview_content'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
