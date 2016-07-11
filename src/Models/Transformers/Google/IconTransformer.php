<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Icon;

class IconTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Icon $icon)
    {
        $coords = explode(',', $icon->coords);
        array_walk($coords, function(&$item) {
            $item = (int) $item;
        });

        return [
            'latitude' => (double) $icon->latitude,
            'longitude' => (double) $icon->longitude,
            'shape' => [
                'coords' => (array) $coords,
                'type' => 'poly'
            ],
            'image' => (string) $icon->image,
            'width' => (int) $icon->width,
            'height' => (int) $icon->height
        ];
    }
}
