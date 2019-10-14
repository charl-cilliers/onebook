<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
