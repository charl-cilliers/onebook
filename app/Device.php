<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * App\Device
 *
 * @property int $id
 * @property string $device_id
 * @property int|null $user_id
 * @property string|null $access_token
 * @property string $type
 * @property string|null $push_token
 * @property string $version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device wherePushToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereVersion($value)
 * @mixin \Eloquent
 */
class Device extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id', 'type', 'version', 'push_token'
    ];

    protected $hidden = [
        'version'
    ];

    public function setAccessToken() {
        $this->access_token = (string) Uuid::uuid4();
    }

    public function getAccessToken() {
        return $this->access_token;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
