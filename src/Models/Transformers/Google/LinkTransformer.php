<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Link;

class LinkTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Link $link)
    {
        return [
            'href' => (string) $link->href,
            'title' => (string) $link->title,
            'target' => (string) $link->target
        ];
    }
}
