<?php

namespace App\Models;

use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

class Company extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];
    public array $searchable = ['phone_number', 'display_name', 'city', 'address', 'owner.email'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function scans(): HasMany
    {
        return $this->hasMany(Scan::class, 'company_id');
    }

    public function sites(): HasMany
    {
        return $this->hasMany(Site::class, 'company_id');
    }

    public function attendancies(): HasMany
    {
        return $this->hasMany(Attendance::class, 'company_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'company_id');
    }


}
