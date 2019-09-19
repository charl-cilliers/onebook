<?php

namespace App;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
