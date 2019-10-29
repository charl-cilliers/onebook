<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubIndustry
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $industry_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business[] $business
 * @property-read int|null $business_count
 * @property-read \App\Industry $industry
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubIndustry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubIndustry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function business(){
        return $this->hasMany('App\Business');
    }

    public function industry() {
        return $this->belongsTo('App\Industry');
    }
}
