<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile_number'
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
        'password', 'remember_token'
    ];

    public function device() {
        return $this->hasOne(Device::class);
    }

    public function ratings() {
        return $this->hasMany('App\Rating');
    }

    public function flags() {
        return $this->hasMany('App\Flag');
    }

    public function favorites() {
        return $this->belongsToMany('App\Favorite')->using('App\Favorite');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

}
