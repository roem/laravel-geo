<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Roem\Geo\Models\Relations\BelongsToMap;
use Roem\Geo\Models\Relations\HasOneIcon;
use Roem\Geo\Models\Relations\HasOneInfowindow;
use Roem\Geo\Models\Relations\HasOneLink;

class Marker extends Model
{
    use BelongsToMap;
    use HasOneIcon, HasOneInfowindow, HasOneLink;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_markers';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'label' => 'string',
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
        'label',
        'latitude',
        'longitude',
        'zoom',
        'adaptzoom',
        'scrollwheel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'zoom',
        'adaptzoom',
        'scrollwheel'
    ];

}
