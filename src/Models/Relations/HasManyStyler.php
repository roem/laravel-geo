<?php

namespace Roem\Geo\Models\Relations;

trait HasManyStyler
{
    /**
     * Get the Styler relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stylers()
    {
        return $this->hasMany('Roem\Geo\Models\Styler');
    }
}
