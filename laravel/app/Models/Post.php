<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use Base;

    const UPDATED_AT = null;

    protected $appends = [
        'created_at_diff'
    ];

    public function topic() : BelongsTo {
        return $this->belongsTo(Topic::class);
    }
}
