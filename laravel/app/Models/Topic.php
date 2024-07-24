<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    use Base;
    protected $appends = [
        'created_at_diff',
        'post_count'
    ];

    const UPDATED_AT = null;

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function getPostCountAttribute() {
        return $this->posts()->count();
    }

}
