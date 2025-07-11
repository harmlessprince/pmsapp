<?php

namespace App\Models;

use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Incident extends Model
{
    use HasFactory , SearchableTrait;

    protected $guarded = [];

    public array $searchable = ['reportedBy.first_name', 'reportedBy.last_name', 'comment'];

    protected function Image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return Storage::url($value);
            },
        );
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }


    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }
}
