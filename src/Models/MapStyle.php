<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Roem\Geo\Models\Relations\BelongsToManyMap;
use Roem\Geo\Models\Relations\MorphManyStyle;

class MapStyle extends Model
{
    use BelongsToManyMap;
    use MorphManyStyle;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_map_styles';

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
        'updated_at',
        'deleted_at'
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
