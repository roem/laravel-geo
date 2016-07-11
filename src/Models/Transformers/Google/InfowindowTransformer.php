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
            'content' => (string) "<div id=\"content\"><div id=\"siteNotice\"></div><b>{$infowindow->title}</b><div id=\"bodyContent\">{$infowindow->description}</div></div>",
            'open' => (bool) $infowindow->open
        ];
    }
}
