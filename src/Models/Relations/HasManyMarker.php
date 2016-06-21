<?php

namespace Roem\Geo\Models\Relations;

trait HasManyMarker
{
    /**
     * Get the Marker relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markers()
    {
        return $this->hasMany('Roem\Geo\Models\Marker');
    }
}
