<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Industry
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business[] $business
 * @property-read int|null $business_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Industry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Industry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Industry query()
 * @mixin \Eloquent
 */
class Industry extends Model
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
}
