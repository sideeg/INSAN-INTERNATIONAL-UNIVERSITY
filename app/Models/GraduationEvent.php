<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class GraduationEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'convocation_number',
        'title',
        'slug',
        'type',
        'description',
        'venue',
        'ceremony_date',
        'cover_image',
        'gallery_images',
        'graduates_count',
        'keynote_speaker',
        'programme_booklet_url',
        'live_stream_url',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'ceremony_date'  => 'date',
        'gallery_images' => 'array',
        'is_published'   => 'boolean',
    ];

    // ──────────────────────────────────────────────────────
    // Boot — auto-generate slug on create
    // ──────────────────────────────────────────────────────

    protected static function booted(): void
    {
        static::creating(function (self $model): void {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    // ──────────────────────────────────────────────────────
    // Scopes
    // ──────────────────────────────────────────────────────

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeConvocations(Builder $query): Builder
    {
        return $query->where('type', 'convocation');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        // Most recent ceremony first in archive listings
        return $query->orderByDesc('ceremony_date')->orderByDesc('convocation_number');
    }

    // ──────────────────────────────────────────────────────
    // Accessors
    // ──────────────────────────────────────────────────────

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image
            ? asset('storage/' . $this->cover_image)
            : asset('images/graduation-placeholder.jpg');
    }

    /**
     * Returns "1st", "2nd", "3rd", "4th" etc. for the convocation number.
     */
    public function getOrdinalAttribute(): ?string
    {
        if (! $this->convocation_number) {
            return null;
        }
        $n = $this->convocation_number;
        $suffix = match(true) {
            $n % 100 >= 11 && $n % 100 <= 13 => 'th',
            $n % 10 === 1 => 'st',
            $n % 10 === 2 => 'nd',
            $n % 10 === 3 => 'rd',
            default       => 'th',
        };
        return $n . $suffix;
    }

    /**
     * Full gallery image URLs as an array.
     */
    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery_images ?? [])
            ->map(fn($path) => asset('storage/' . $path))
            ->all();
    }

    /**
     * Whether a live stream URL exists and the ceremony hasn't happened yet.
     */
    public function isUpcoming(): bool
    {
        return $this->ceremony_date && $this->ceremony_date->isFuture();
    }
}