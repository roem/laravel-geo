<?php

namespace Roem\Geo\Models\Relations;

trait MorphOneMap
{
    /**
     * Get the Map relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function map()
    {
        return $this->morphOne('Roem\Geo\Models\Map', 'mapable');
    }
}
