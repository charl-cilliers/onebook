<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
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

    public function services(){
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function providers() {
        return $this->belongsTo('App\Provider', 'provider_id');
    }

    public function ratings() {
        return $this->hasOne('App\Rating');
    }

    public function business() {
        return $this->belongsTo('App\Business', 'business_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function walkin() {
        return $this->belongsTo('App\Walkin', 'walkin_id');
    }

}
