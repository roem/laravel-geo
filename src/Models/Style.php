<?php namespace Roem\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Roem\Geo\Models\Relations\HasManyStyler;

class Style extends Model
{
    use HasManyStyler;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roem_geo_styles';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'featureType' => 'string',
        'elementType' => 'string'
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
        'featureType',
        'elementType'
    ];

    /**
     * Get the model the action has been taken on.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function styleable()
    {
        return $this->morphTo();
    }
}
