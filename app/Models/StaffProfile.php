<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Translatable\HasTranslations;

class StaffProfile extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['name', 'title', 'department', 'bio', 'bio_extended', 'qualifications'];

    protected $fillable = [
        'name', 'title', 'department', 'role_type',
        'bio', 'bio_extended', 'portrait',
        'email', 'phone', 'qualifications',
        'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function scopeByRole(Builder $query, string $role): Builder
    {
        return $query->where('role_type', $role);
    }

    public function getRoleLabelAttribute(): string
    {
        return match($this->role_type) {
            'vc'         => __('Vice Chancellor'),
            'governance' => __('Governance'),
            'leadership' => __('Leadership'),
            default      => ucfirst(__($this->role_type)),
        };
    }

    public function getPortraitUrlAttribute(): string
    {
        return $this->portrait
            ? (str_starts_with($this->portrait, 'http') ? $this->portrait : asset('storage/' . $this->portrait))
            : asset('images/staff-placeholder.png');
    }
}