<?php

namespace Roem\Geo\Models\Relations;

trait BelongsToManyMap
{
    /**
     * Get the Map relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function maps()
    {
        return $this->belongsToMany('Roem\Geo\Models\Map', 'roem_geo_map_map_style')->withTimestamps();
    }
}
