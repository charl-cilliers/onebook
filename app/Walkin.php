<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Walkin
 *
 * @property int $id
 * @property string $name
 * @property string $mobile_number
 * @property int $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Appointment[] $appointments
 * @property-read int|null $appointments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business[] $business
 * @property-read int|null $business_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Walkin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
