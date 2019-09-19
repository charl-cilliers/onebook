<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname'
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

    public function services(){
        return $this->belongsToMany('App\Service')->using('App\ProviderService');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
