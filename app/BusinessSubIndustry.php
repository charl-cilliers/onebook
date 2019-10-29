<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BusinessSubIndustry
 *
 * @property int $id
 * @property int $sub_industry_id
 * @property int $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\SubIndustry $SubIndustry
 * @property-read \App\Business $business
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry whereSubIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessSubIndustry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusinessSubIndustry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        return $this->belongsTo('App\Business', 'business_id');
    }

    public function SubIndustry(){
        return $this->belongsTo('App\SubIndustry', 'sub_industry_id');
    }
}
