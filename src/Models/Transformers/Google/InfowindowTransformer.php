<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Infowindow;

class InfowindowTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Infowindow $infowindow)
    {
        return [
            'title' => (string) $infowindow->title,
            'slug' => (string) $infowindow->slug,
            'description' => (string) $infowindow->description
        ];
    }
}
