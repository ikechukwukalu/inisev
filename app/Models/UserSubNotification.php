<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\BelongsToWebsite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubNotification extends Model
{
    use HasFactory, SoftDeletes;
    use BelongsToUser, BelongsToWebsite;

    protected $fillable = [
        'user_id',
        'user_pub_id',
        'website_id',
    ];

    public function userPub(): BelongsTo
    {
        return $this->belongsTo(UserPub::class, 'user_pub_id');
    }

}
