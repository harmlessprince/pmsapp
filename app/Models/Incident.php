<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Incident extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected function Image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return Storage::url($value);
            },
        );
    }
}
