<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

trait Base
{
    use HasFactory, SoftDeletes;
//
//    protected function createdAt(): Attribute
//    {
//        return Attribute::make(
//            get: fn (string $value) => date('m/d/Y H:ia', strtotime($value)),
//        );
//    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function deletedBy() : BelongsTo {
        return $this->belongsTo(User::class, "deleted_by", "id");
    }
}
