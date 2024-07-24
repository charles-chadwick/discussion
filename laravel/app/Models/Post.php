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
        'content_clean',
        'preview'
    ];

    public function topic() : BelongsTo {
        return $this->belongsTo(Topic::class);
    }

    public function contentClean() : Attribute {
        return Attribute::make(
            get: fn ($value, $attributes) => strip_tags($attributes['content'])
        );
    }
    public function preview() : Attribute {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::limit(strip_tags($attributes['content']), 100)
        );
    }
}
