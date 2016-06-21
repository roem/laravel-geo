<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Roem\Geo\Models\Relations\BelongsToStyle;

class Styler extends Model
{
    use BelongsToStyle;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_stylers';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'value' => 'string'
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
        'key',
        'value'
    ];

}
