<?php

namespace App\Models;

use App\Traits\BelongsToWebsite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsitePost extends Model
{
    use HasFactory, SoftDeletes;
    use BelongsToWebsite;

    protected $fillable = [
        'website_id',
        'title',
        'description',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

}
