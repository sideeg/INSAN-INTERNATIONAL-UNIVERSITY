<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'category', 'thumbnail',
        'start_date', 'end_date', 'time', 'location',
        'description', 'schedule', 'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'schedule' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function getMonthAttribute(): string
    {
        return $this->start_date?->format('M') ?? '';
    }

    public function getDayAttribute(): string
    {
        return $this->start_date?->format('d') ?? '';
    }

    public function toModalArray(): array
    {
        return [
            'title' => $this->title,
            'category' => ucfirst($this->category),
            'image' => $this->thumbnail,
            'date' => $this->start_date?->format('F d, Y'),
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