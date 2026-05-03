<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class NewsArticle extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'news_articles';

    public $translatable = ['title', 'excerpt', 'content', 'author'];

    protected $fillable = [
        'slug', 'title', 'excerpt', 'content',
        'thumbnail', 'author', 'is_featured',
        'is_published', 'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $englishTitle = $model->getTranslation('title', 'en', false) ?: $model->title;
                $model->slug = Str::slug($englishTitle);
            }
        });
    }

    public function getDateAttribute(): string
    {
        return $this->published_at ? $this->published_at->translatedFormat('d F Y') : '';
    }
}