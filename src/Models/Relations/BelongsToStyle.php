<?php

namespace Roem\Geo\Models\Relations;

trait BelongsToStyle
{
    /**
     * Get the Style relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function style()
    {
        return $this->belongsTo('Roem\Geo\Models\Style');
    }
}
