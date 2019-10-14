<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description', 'location', 'status', 'mobile_number'
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

//    protected $table = 'business';

    protected $hidden = [
        'password',
    ];

    public function services(){
        return $this->hasMany('App\Service');
    }

    public function providers() {
        return $this->hasMany('App\Provider');
    }

    public function favorites() {
        return $this->belongsToMany('App\Favorite')->using('App\Favorite');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function ratings() {
        return $this->hasMany('App\Rating');
    }

    public function flags() {
        return $this->hasMany('App\Flag');
    }

    public function tradingHours() {
        return $this->hasOne('App\TradingHours');
    }

    public function walkIns() {
        return $this->belongsToMany('App\Walkin')->using('App\BusinessWalkin');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    public function industry() {
        return $this->belongsTo('App\Industry', 'industry_id');
    }
}
