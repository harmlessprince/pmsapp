<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory, SearchableTrait;
    protected  $guarded = [];

    public array $searchable = ['site.name', 'user.first_name', 'user.last_name', 'company.name', 'address'];

    public  function site(){
        return $this->belongsTo(Site::class);
    }

    public  function company(){
        return $this->belongsTo(Company::class);
    }

    public  function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }

    public function scopeSite(Builder $query, int $siteID): void
    {
        $query->where('site_id', $siteID);
    }
}
