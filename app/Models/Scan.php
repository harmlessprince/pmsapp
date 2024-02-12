<?php

namespace App\Models;

use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scan extends Model
{
    use HasFactory, SearchableTrait;
    protected  $guarded = [];

    protected $casts = [
        'scan_date' => 'datetime:Y/m/d',
    ];

    public array $searchable = ['site.name', 'company.name', 'tag.name'];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function scannedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function scopeSite(Builder $query, int $siteID): void
    {
        $query->where('site_id', $siteID);
    }
    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }
}
