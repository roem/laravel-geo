<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Roem\Geo\Models\Relations\BelongsToMarker;

class Link extends Model
{
    use BelongsToMarker;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_links';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'href' => 'string',
        'title' => 'string',
        'target' => 'string'
    ];

    /**
     * The properties on the model that are dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes for mass-assignment.
     *
     * @var array
     */
    protected $fillable = [
        'href',
        'title',
        'target'
    ];

}
