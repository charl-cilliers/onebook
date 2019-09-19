<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walkin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile_number'
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
        return $this->belongsToMany('App\Business')->using('App\BusinessWalkin');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
