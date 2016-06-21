<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\MapStyle;

class MapStyleTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'styles'
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'styles'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(MapStyle $mapStyle)
    {
        return [
            'title' => (string) $mapStyle->title,
            'slug' => (string) $mapStyle->slug,
            'description' => (string) $mapStyle->description
        ];
    }

    /**
     * Include Styles
     *
     * @param MapStyle $mapStyle
     * @return \League\Fractal\Resource\Collection
     */
    public function includeStyles(MapStyle $mapStyle)
    {
        if($mapStyle->styles) {
            $styles = $mapStyle->styles;

            return $this->collection($styles, new StyleTransformer);
        }
    }
}
