<?php

namespace Roem\Geo\Models\Relations;

trait HasOneLink
{
    /**
     * Get the Link relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function link()
    {
        return $this->hasOne('Roem\Geo\Models\Link');
    }
}
