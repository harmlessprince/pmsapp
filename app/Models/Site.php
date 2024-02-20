<?php

namespace App\Models;

use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Site extends Model
{
    use HasFactory, SearchableTrait;

    public array $searchable = ['name', 'inspector.email'];
    protected  $guarded = [];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!str_contains($value, 'sites')) {
                    return $value;
                }
                return Storage::url($value);
            },
        );
    }
    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }
}
