<?php

namespace App\Models\Traits;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

trait Base
{
    use HasFactory, SoftDeletes;

    protected function createdAtDiff(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['created_at'])->diffForHumans()
        );
    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function deletedBy() : BelongsTo {
        return $this->belongsTo(User::class, "deleted_by", "id");
    }
}
