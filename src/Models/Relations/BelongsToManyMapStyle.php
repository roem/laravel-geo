<?php

namespace Roem\Geo\Models\Relations;

trait BelongsToManyMapStyle
{
    /**
     * Get the MapStyle relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mapStyles()
    {
        return $this->belongsToMany('Roem\Geo\Models\MapStyle', 'roem_geo_map_map_style')->withTimestamps();
    }
}
