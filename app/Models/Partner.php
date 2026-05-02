<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'acronym',
        'logo',
        'partnership_type',
        'country',
        'website_url',
        'description',
        'mou_signed_date',
        'mou_expiry_date',
        'sort_order',
        'is_active',
        'show_on_homepage',
    ];

    protected $casts = [
        'mou_signed_date'  => 'date',
        'mou_expiry_date'  => 'date',
        'is_active'        => 'boolean',
        'show_on_homepage' => 'boolean',
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

    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('partnership_type', $type);
    }

    public function scopeForHomepage(Builder $query): Builder
    {
        return $query->where('show_on_homepage', true);
    }

    // ──────────────────────────────────────────────────────
    // Accessors
    // ──────────────────────────────────────────────────────

    public function getLogoUrlAttribute(): string
    {
        return $this->logo
            ? asset('storage/' . $this->logo)
            : asset('images/partner-placeholder.png');
    }

    /**
     * Human-readable label for the partnership type.
     */
    public function getTypeLabelAttribute(): string
    {
        return match($this->partnership_type) {
            'academic'      => 'Academic Institution',
            'industry'      => 'Industry Partner',
            'government'    => 'Government Body',
            'international' => 'International Organisation',
            'mou'           => 'MoU Partner',
            default         => ucfirst($this->partnership_type),
        };
    }

    /**
     * Whether a valid (non-expired) MoU exists.
     */
    public function hasMou(): bool
    {
        return $this->mou_signed_date !== null;
    }

    public function isMouActive(): bool
    {
        if (! $this->mou_expiry_date) {
            return $this->hasMou(); // No expiry = treat as ongoing
        }
        return $this->mou_expiry_date->isFuture();
    }
}