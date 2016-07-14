<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Link;
use Roem\Geo\Models\Marker;
use stdClass;

class MarkerTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'icon',
        'infowindow',
        'link'
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'icon',
        'infowindow',
        'link'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Marker $marker)
    {
        return [
            'title' => (string) $marker->title,
            'slug' => (string) $marker->slug,
            'label' => $marker->label ? (string) $marker->label : (bool) false,
            'latitude' => (double) $marker->latitude,
            'longitude' => (double) $marker->longitude
        ];
    }

    /**
     * Include Icon
     *
     * @param Marker $marker
     * @return \League\Fractal\Resource\Item
     */
    public function includeIcon(Marker $marker)
    {
        if($marker->icon) {
            $icon = $marker->icon;

            return $this->item($icon, new IconTransformer);
        }
    }

    /**
     * Include Infowindow
     *
     * @param Marker $marker
     * @return \League\Fractal\Resource\Item
     */
    public function includeInfowindow(Marker $marker)
    {
        if($marker->infowindow) {
            $infowindow = $marker->infowindow;

            return $this->item($infowindow, new InfowindowTransformer);
        }
    }

    /**
     * Include Link
     *
     * @param Marker $marker
     * @return \League\Fractal\Resource\Item
     */
    public function includeLink(Marker $marker)
    {
        if($marker->link) {
            $link = $marker->link;

            return $this->item($link, new LinkTransformer);
        }
    }
}
