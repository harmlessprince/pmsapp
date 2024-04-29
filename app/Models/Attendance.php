<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Attendance extends Model
{
    use HasFactory, SearchableTrait;
    protected  $guarded = [];
    protected $casts = [
        'attendance_date' => 'datetime:Y/m/d',
    ];
    public array $searchable = ['user.first_name', 'user.last_name'];

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

    protected function Image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!str_contains($value, 'profile_images')) {
                    return $value;
                }
                return Storage::url($value);
            },
        );
    }
}
