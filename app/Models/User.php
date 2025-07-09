<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use App\Scopes\FilterByCompanyIdScope;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    public array $searchable = ['first_name', 'last_name', 'phone_number'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'logout_pin'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'owner_id');
    }

    public function tenant()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'state_id');
    }

    public function scopeSite(Builder $query, int $siteID): void
    {
        $query->where('site_id', $siteID);
    }

    public function isAdministrator(): bool
    {
        return $this->hasRole(RoleEnum::ADMIN->value) || $this->hasRole(RoleEnum::SUPER_ADMIN->value);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(RoleEnum::SUPER_ADMIN->value);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(RoleEnum::ADMIN->value);
    }

    public function isCompanyOwner(): bool
    {
        return $this->hasRole(RoleEnum::COMPANY_OWNER->value);
    }

    public function isSiteInspector(): bool
    {
        return $this->hasRole(RoleEnum::SITE_INSPECTOR->value);
    }

    public function isSecurity(): bool
    {
        return $this->hasRole(RoleEnum::SECURITY->value);
    }
    public function isPersonnel(): bool
    {
        return $this->hasRole(RoleEnum::PERSONNEL->value);
    }

    protected function profileImage(): Attribute
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

    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new FilterByCompanyIdScope());
    }
}
