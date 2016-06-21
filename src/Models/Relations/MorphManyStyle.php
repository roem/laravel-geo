<?php

namespace Roem\Geo\Models\Relations;

trait MorphManyStyle
{
    /**
     * Get the Style relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function styles()
    {
        return $this->morphMany('Roem\Geo\Models\Style', 'styleable');
    }
}
