<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $mobile_number
 * @property string $email
 * @property string $location
 * @property string $password
 * @property string $status
 * @property int $blocked
 * @property string|null $block_reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Appointment[] $appointments
 * @property-read int|null $appointments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Favorite[] $favorites
 * @property-read int|null $favorites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Flag[] $flags
 * @property-read int|null $flags_count
 * @property-read \App\Industry $industry
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Provider[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @property-read \App\TradingHours $tradingHours
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Walkin[] $walkIns
 * @property-read int|null $walk_ins_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereBlockReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Business whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
