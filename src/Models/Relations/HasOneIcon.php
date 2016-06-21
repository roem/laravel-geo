<?php

namespace Roem\Geo\Models\Relations;

trait HasOneIcon
{
    /**
     * Get the Icon relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function icon()
    {
        return $this->hasOne('Roem\Geo\Models\Icon');
    }
}
