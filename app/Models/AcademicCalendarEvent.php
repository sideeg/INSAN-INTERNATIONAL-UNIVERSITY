<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AcademicCalendarEvent extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'category',
        'color',
        'is_all_day',
        'is_published',
        'academic_year',
        'sort_order',
    ];

    protected $casts = [
        'start_date'   => 'date',
        'end_date'     => 'date',
        'is_all_day'   => 'boolean',
        'is_published' => 'boolean',
    ];

    // Category colour map for the frontend timeline
    public const CATEGORY_COLORS = [
        'admission'   => '#F53003',
        'academic'    => '#1b1b18',
        'examination' => '#e67e00',
        'graduation'  => '#1a6b3a',
        'holiday'     => '#5c4a8a',
        'orientation' => '#0062a3',
        'other'       => '#706f6c',
    ];

    public const CATEGORY_LABELS = [
        'admission'   => 'Admissions',
        'academic'    => 'Academic',
        'examination' => 'Examinations',
        'graduation'  => 'Graduation',
        'holiday'     => 'Holidays',
        'orientation' => 'Orientation',
        'other'       => 'Other',
    ];

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeForYear(Builder $query, string $year): Builder
    {
        return $query->where('academic_year', $year);
    }

    public function scopeInCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('start_date', '>=', now()->toDateString());
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('start_date')->orderBy('sort_order');
    }

    // ── Accessors ─────────────────────────────────────────────────────────────

    public function getCategoryColorAttribute(): string
    {
        return self::CATEGORY_COLORS[$this->category] ?? '#706f6c';
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORY_LABELS[$this->category] ?? ucfirst($this->category);
    }

    public function getIsMultiDayAttribute(): bool
    {
        return $this->end_date && $this->end_date->ne($this->start_date);
    }

    public function getFormattedDateRangeAttribute(): string
    {
        if (! $this->end_date || $this->end_date->eq($this->start_date)) {
            return $this->start_date->format('d M Y');
        }

        if ($this->start_date->month === $this->end_date->month) {
            return $this->start_date->format('d') . ' – ' . $this->end_date->format('d M Y');
        }

        return $this->start_date->format('d M') . ' – ' . $this->end_date->format('d M Y');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    /**
     * Return events grouped by month name for timeline rendering.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function groupedByMonth(string $academicYear): \Illuminate\Support\Collection
    {
        return static::published()
            ->forYear($academicYear)
            ->ordered()
            ->get()
            ->groupBy(fn ($event) => $event->start_date->format('F Y'));
    }

    /**
     * Return the current (most recent) academic year string, e.g. "2024/2025".
     */
    public static function currentAcademicYear(): string
    {
        $year = now()->month >= 8 ? now()->year : now()->year - 1;
        return $year . '/' . ($year + 1);
    }

    /**
     * All distinct academic years present in the table.
     */
    public static function availableYears(): \Illuminate\Support\Collection
    {
        return static::published()
            ->distinct()
            ->orderByDesc('academic_year')
            ->pluck('academic_year');
    }
}
