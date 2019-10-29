<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Appointment
 *
 * @property int $id
 * @property int $business_id
 * @property int $service_id
 * @property int $provider_id
 * @property int|null $user_id
 * @property int|null $walkin_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Business $business
 * @property-read \App\Provider $providers
 * @property-read \App\Rating $ratings
 * @property-read \App\Service $services
 * @property-read \App\User|null $user
 * @property-read \App\Walkin|null $walkin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Appointment whereWalkinId($value)
 * @mixin \Eloquent
 */
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
