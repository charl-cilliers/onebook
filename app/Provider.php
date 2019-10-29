<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Provider
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Appointment[] $appointments
 * @property-read int|null $appointments_count
 * @property-read \App\Business $business
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Provider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
