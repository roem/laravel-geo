<?php

namespace Roem\Geo\Models\Relations;

trait HasOneInfowindow
{
    /**
     * Get the Infowindow relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infowindow()
    {
        return $this->hasOne('Roem\Geo\Models\Infowindow');
    }
}
