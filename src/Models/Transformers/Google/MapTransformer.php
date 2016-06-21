<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Map;

class MapTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'markers',
        'map_styles',
        'styles'
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'markers',
        'map_styles',
        'styles'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Map $map)
    {
        return [
            'latitude' => (double) $map->latitude,
            'longitude' => (double) $map->longitude,
            'zoom' => (int) $map->zoom,
            'adaptzoom' => (bool) $map->adaptzoom,
            'scrollwheel' => (bool) $map->scrollwheel
        ];
    }

    /**
     * Include MapStyles
     *
     * @param Map $map
     * @return \League\Fractal\Resource\Collection
     */
    public function includeMapStyles(Map $map)
    {
        if($map->mapStyles) {
            $mapStyles = $map->mapStyles;

            return $this->collection($mapStyles, new MapStyleTransformer);
        }
    }

    /**
     * Include Styles
     *
     * @param Map $map
     * @return \League\Fractal\Resource\Collection
     */
    public function includeStyles(Map $map)
    {
        if($map->styles) {
            $styles = $map->styles;

            return $this->collection($styles, new StyleTransformer);
        }
    }

    /**
     * Include Markers
     *
     * @param Map $map
     * @return \League\Fractal\Resource\Collection
     */
    public function includeMarkers(Map $map)
    {
        if($map->markers) {
            $markers = $map->markers;

            return $this->collection($markers, new MarkerTransformer);
        }
    }
}
