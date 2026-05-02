<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'overview',
        'benefits',
        'eligibility_criteria',
        'required_documents',
        'purposes',
        'application_process',
        'application_deadline',
        'application_url',
        'duration',
        'renewal_conditions',
        'impact_points',
        'partner_organisation',
        'partner_logo',
        'covers_full_tuition',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'benefits'             => 'array',
        'eligibility_criteria' => 'array',
        'required_documents'   => 'array',
        'purposes'             => 'array',
        'impact_points'        => 'array',
        'application_deadline' => 'date',
        'covers_full_tuition'  => 'boolean',
        'is_active'            => 'boolean',
        'is_featured'          => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getIsOpenAttribute(): bool
    {
        if (! $this->application_deadline) {
            return true;
        }
        return $this->application_deadline->isFuture();
    }

    public function getDeadlineFormattedAttribute(): ?string
    {
        return $this->application_deadline?->format('d F Y');
    }
}
