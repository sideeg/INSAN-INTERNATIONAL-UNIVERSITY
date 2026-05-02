<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class StaffProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'department',
        'role_type',
        'bio',
        'bio_extended',
        'portrait',
        'email',
        'phone',
        'qualifications',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ──────────────────────────────────────────────────────
    // Scopes
    // ──────────────────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeByRole(Builder $query, string $role): Builder
    {
        return $query->where('role_type', $role);
    }

    // ──────────────────────────────────────────────────────
    // Accessors
    // ──────────────────────────────────────────────────────

    /**
     * Returns the ordinal label for the role type, useful in views.
     */
    public function getRoleLabelAttribute(): string
    {
        return match($this->role_type) {
            'vc'         => 'Vice Chancellor',
            'governance' => 'Governance',
            'leadership' => 'Leadership',
            default      => ucfirst($this->role_type),
        };
    }

    /**
     * Full URL to the portrait, with a sensible placeholder fallback.
     */
    public function getPortraitUrlAttribute(): string
    {
        return $this->portrait
            ? asset('storage/' . $this->portrait)
            : asset('images/staff-placeholder.png');
    }
}