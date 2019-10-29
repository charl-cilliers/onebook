<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TradingHours
 *
 * @property int $id
 * @property int $business_id
 * @property string $sunday_open
 * @property string $sunday_close
 * @property string $monday_open
 * @property string $monday_close
 * @property string $tuesday_open
 * @property string $tuesday_close
 * @property string $wednesday_open
 * @property string $wednesday_close
 * @property string $thursday_open
 * @property string $thursday_close
 * @property string $friday_open
 * @property string $friday_close
 * @property string $saturday_open
 * @property string $saturday_close
 * @property string $holiday_open
 * @property string $holiday_close
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Business $business
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereFridayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereFridayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereHolidayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereHolidayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereMondayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereMondayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereSaturdayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereSaturdayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereSundayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereSundayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereThursdayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereThursdayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereTuesdayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereTuesdayOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereWednesdayClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TradingHours whereWednesdayOpen($value)
 * @mixin \Eloquent
 */
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
