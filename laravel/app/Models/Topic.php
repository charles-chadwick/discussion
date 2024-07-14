<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Base;

    const UPDATED_AT = null;

    protected $appends = [
        'created_at_diff',
        'last_post',
        'first_post',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function lastPost() : Attribute {
        return Attribute::make(
            get: function ($value, $attributes) {
                return $this->posts()->orderBy('created_at', 'desc')->first();
            }
        );

    }
    public function firstPost() : Attribute {
        return Attribute::make(
            get: function ($value, $attributes) {
                return $this->posts()->orderBy('created_at')->first();
            }
        );

    }

}
