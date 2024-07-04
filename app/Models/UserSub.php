<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\BelongsToWebsite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSub extends Model
{
    use HasFactory, SoftDeletes;
    use BelongsToUser, BelongsToWebsite;

    protected $fillable = [
        'user_id',
        'website_id',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

}
