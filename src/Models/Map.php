<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Roem\Geo\Models\Relations\BelongsToManyMapStyle;
use Roem\Geo\Models\Relations\HasManyMarker;
use Roem\Geo\Models\Relations\MorphManyStyle;

class Map extends Model
{
    use BelongsToManyMapStyle;
    use HasManyMarker;
    use MorphManyStyle;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_maps';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'type' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'zoom' => 'int',
        'adaptzoom' => 'bool',
        'scrollwheel' => 'bool'
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
        'title',
        'slug',
        'type',
        'latitude',
        'longitude',
        'zoom',
        'adaptzoom',
        'scrollwheel'
    ];

    /**
     * Get the model the action has been taken on.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function mapable()
    {
        return $this->morphTo();
    }
}
