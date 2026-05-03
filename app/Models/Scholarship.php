<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;  // ✅ ADD THIS
use Spatie\Translatable\HasTranslations; 
class Scholarship extends Model
{
    use HasFactory ,HasTranslations;

     // ✅ ADD translatable array
    public $translatable = [
        'name', 'tagline', 'overview', 'benefits', 
        'eligibility_criteria', 'required_documents',
        'purposes', 'application_process', 'impact_points'
    ];

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
        'name'                 => 'array',
        'tagline'              => 'array',
        'overview'             => 'array',
        'benefits'             => 'array',
        'eligibility_criteria' => 'array',
        'required_documents'   => 'array',
        'purposes'             => 'array',
        'application_process'  => 'array',
        'impact_points'        => 'array',
        'covers_full_tuition'  => 'boolean',
        'is_active'            => 'boolean',
        'is_featured'          => 'boolean',
        'application_deadline' => 'date',
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
