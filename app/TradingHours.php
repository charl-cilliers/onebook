<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingHours extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sunday_open', 'sunday_close', 'monday_open', 'monday_close',
        'tuesday_open', 'tuesday_close', 'wednesday_open', 'wednesday_close',
        'thursday_open', 'thursday_close', 'friday_open', 'friday_close',
        'saturday_open', 'saturday_close', 'holiday_open', 'holiday_close',
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
}
