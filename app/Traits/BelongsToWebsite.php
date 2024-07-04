<?php

namespace App\Traits;

use App\Models\Website;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToWebsite
{

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
