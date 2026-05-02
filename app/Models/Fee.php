<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    protected $fillable = [
        'fee_category_id',
        'programme_level',
        'programme_name',
        'name',
        'amount',
        'currency',
        'frequency',
        'notes',
        'academic_year',
        'is_active',
        'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean', 'amount' => 'decimal:2'];

    public const FREQUENCY_LABELS = [
        'per_semester' => 'Per Semester',
        'per_year'     => 'Per Year',
        'once'         => 'One-time',
        'per_module'   => 'Per Module',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeForYear(Builder $query, string $year): Builder
    {
        return $query->where('academic_year', $year);
    }

    public function scopeForLevel(Builder $query, string $level): Builder
    {
        return $query->where('programme_level', $level);
    }

    public function getFormattedAmountAttribute(): string
    {
        return $this->currency . ' ' . number_format($this->amount, 0);
    }

    public function getFrequencyLabelAttribute(): string
    {
        return self::FREQUENCY_LABELS[$this->frequency] ?? $this->frequency;
    }

    /**
     * Return fees grouped by category and then level for the fees page.
     */
    public static function structuredForDisplay(string $academicYear): \Illuminate\Support\Collection
    {
        return FeeCategory::active()
            ->with(['fees' => fn ($q) => $q->active()->forYear($academicYear)->orderBy('sort_order')])
            ->get()
            ->filter(fn ($cat) => $cat->fees->isNotEmpty());
    }

    /**
     * Distinct programme levels available for a given year.
     */
    public static function availableLevels(string $academicYear): \Illuminate\Support\Collection
    {
        return static::active()
            ->forYear($academicYear)
            ->distinct()
            ->orderBy('programme_level')
            ->pluck('programme_level');
    }

    /**
     * The most recent academic year present in the fees table.
     */
    public static function latestYear(): string
    {
        return static::active()->orderByDesc('academic_year')->value('academic_year')
            ?? AcademicCalendarEvent::currentAcademicYear();
    }
}
