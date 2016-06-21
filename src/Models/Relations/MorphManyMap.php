<?php

namespace Roem\Geo\Models\Relations;

trait MorphManyMap
{
    /**
     * Get the Map relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function maps()
    {
        return $this->morphMany('Roem\Geo\Models\Map', 'mapable');
    }
}
