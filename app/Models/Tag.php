<?php

namespace App\Models;

use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];

    public array $searchable = ['name', 'code', 'comment'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scans()
    {
        return $this->hasMany(Scan::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
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
