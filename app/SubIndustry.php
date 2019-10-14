<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
