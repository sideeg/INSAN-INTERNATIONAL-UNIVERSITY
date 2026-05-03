<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // ADD THIS

class Programme extends Model
{
    use HasTranslations; // ADD THIS

    // Define the translatable columns
    public $translatable = ['title', 'description'];

    protected $fillable = [
        'slug', 'title', 'type', 'category', 'icon', 'badge',
        'description', 'duration', 'credits', 'intake',
        'requirements', 'fees', 'modules',
        'thumbnail', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'requirements' => 'array',
        'fees' => 'array',
        'modules' => 'array',
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

    public function toModalArray(): array
    {
        return [
            'title' => $this->title,
            'type' => "{$this->badge} — " . ucfirst($this->category),
            'icon' => $this->icon,
            'description' => $this->description,
            'duration' => $this->duration,
            'credits' => $this->credits,
            'intake' => $this->intake,
            'requirements' => $this->requirements ?? [],
            'fees' => $this->fees ?? [],
            'modules' => $this->modules ?? [],
        ];
    }
}