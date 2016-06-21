<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Styler;

class StylerTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Styler $styler
     * @return array
     */
    public function transform(Styler $styler)
    {
        return [
            $styler->key => $styler->value
        ];
    }
}
