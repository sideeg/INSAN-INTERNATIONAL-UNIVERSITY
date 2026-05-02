<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle', 'icon',
        'features', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}