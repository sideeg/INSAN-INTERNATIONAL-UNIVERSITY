<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;  // ✅ ADD THIS
use Illuminate\Support\Str;    
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'location', 'time', 'description', 'schedule'];

    protected $fillable = [
        'slug', 'title', 'category', 'thumbnail',
        'start_date', 'end_date', 'time', 'location',
        'description', 'schedule', 'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                // Generates slug from the English title fallback to avoid Arabic URL issues
                $englishTitle = $model->getTranslation('title', 'en', false) ?: $model->title;
                $model->slug = Str::slug($englishTitle);
            }
        });
    }

    public function getMonthAttribute(): string
    {
        // Translates month abbreviations if using Carbon localized
        return $this->start_date ? $this->start_date->translatedFormat('M') : '';
    }

    public function getDayAttribute(): string
    {
        return $this->start_date ? $this->start_date->format('d') : '';
    }

    public function toModalArray(): array
    {
        return [
            // $this->title automatically outputs the translation for the current app()->getLocale()
            'title' => $this->title,
            'category' => ucfirst(__($this->category)),
            'image' => $this->thumbnail,
            'date' => $this->start_date ? $this->start_date->translatedFormat('d F Y') : '',
            'time' => $this->time,
            'location' => $this->location,
            'description' => $this->description,
            'schedule' => $this->schedule ?? [],
        ];
    }

    public function scopeUpcoming($query)
    {
        return $query->where('end_date', '>=', Carbon::today());
    }
}