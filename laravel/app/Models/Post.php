<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Post extends Model
{
    use Base;

    const UPDATED_AT = null;

    protected $appends = [
        'created_at_diff',
        'truncated'
    ];

    public function topic() : BelongsTo {
        return $this->belongsTo(Topic::class);
    }

    public function truncated() : Attribute {
        return Attribute::make(
            get: function($value, $attributes) { return Str::limit($attributes['content']); }
        );
    }
}
