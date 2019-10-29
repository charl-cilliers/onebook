<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Flag
 *
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property string $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Business $business
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Flag whereUserId($value)
 * @mixin \Eloquent
 */
class Flag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
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

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
