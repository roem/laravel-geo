<?php

namespace Roem\Geo\Models\Relations;

trait BelongsToMarker
{
    /**
     * Get the Marker relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('Roem\Geo\Models\Marker');
    }
}
