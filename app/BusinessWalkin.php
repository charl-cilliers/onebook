<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\BusinessWalkin
 *
 * @property-read \App\Business $business
 * @property-read \App\Walkin $walkin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessWalkin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessWalkin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BusinessWalkin query()
 * @mixin \Eloquent
 */
class BusinessWalkin extends Pivot
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
        return $this->belongsTo('App\Business');
    }

    public function walkin(){
        return $this->belongsTo('App\Walkin');
    }
}
