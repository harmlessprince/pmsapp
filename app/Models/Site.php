<?php

namespace App\Models;

use App\Scopes\FilterByCompanyIdScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Site extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }
}
