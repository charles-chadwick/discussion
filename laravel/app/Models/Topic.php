<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Base;

    const UPDATED_AT = null;

    protected $appends = [
        'created_at_diff'
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
