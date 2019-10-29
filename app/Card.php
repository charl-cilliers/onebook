<?php

namespace App;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Card
 *
 * @property int $id
 * @property int $business_id
 * @property string $token
 * @property string $bin
 * @property string $digits
 * @property string $expiry
 * @property string $card_holder
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Business $business
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Card onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereBin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereCardHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereDigits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Card withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Card withoutTrashed()
 * @mixin \Eloquent
 */
class Card extends Model
{
    use Encryptable;
    use SoftDeletes;

    protected $encryptable = [
        'bin',
        'digits',
        'expiry',
        'card_holder',
        'token'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bin', 'digits', 'expiry', 'card_holder', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token', 'id', 'deleted_at'
    ];

    public function business() {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
