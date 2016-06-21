<?php

namespace Roem\Geo\Models\Transformers\Google;

use League\Fractal\TransformerAbstract;
use Roem\Geo\Models\Style;

class StyleTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'stylers'
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'stylers'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Style $style)
    {
        return [
            'featureType' => (string) $style->featureType,
            'elementType' => (string) $style->elementType
        ];
    }

    /**
     * Include Stylers
     *
     * @param Style $style
     * @return \League\Fractal\Resource\Collection
     */
    public function includeStylers(Style $style)
    {
        if($style->stylers) {
            $stylers = $style->stylers;

            return $this->collection($stylers, new StylerTransformer);
        }
    }
}
