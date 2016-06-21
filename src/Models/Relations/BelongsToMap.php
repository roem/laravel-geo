<?php

namespace Roem\Geo\Models\Relations;

trait BelongsToMap
{
    /**
     * Get the Map relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function map()
    {
        return $this->belongsTo('Roem\Geo\Models\Map');
    }
}
