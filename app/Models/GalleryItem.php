<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'caption', 'media_type',
        'thumbnail', 'video_url', 'duration',
        'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getMediaTypeLabelAttribute(): string
    {
        return ucfirst($this->media_type);
    }
}