<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Roem\Geo\Models\Relations\BelongsToMarker;

class Icon extends Model
{
    use BelongsToMarker;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_icons';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
        'coords' => 'string',
        'image' => 'string',
        'width' => 'int',
        'height' => 'int'
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
        'latitude',
        'longitude',
        'coords',
        'image',
        'width',
        'height'
    ];

}
