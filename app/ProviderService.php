<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\ProviderService
 *
 * @property-read \App\Provider $providers
 * @property-read \App\Service $services
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProviderService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProviderService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProviderService query()
 * @mixin \Eloquent
 */
class ProviderService extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'duration'
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

    public function providers(){
        return $this->belongsTo('App\Provider', 'provider_id');
    }
}
