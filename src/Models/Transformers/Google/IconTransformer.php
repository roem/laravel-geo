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
        return [
            'latitude' => (double) $icon->latitude,
            'longitude' => (double) $icon->longitude,
            'coords' => (string) $icon->coords,
            'image' => (string) $icon->image
        ];
    }
}
