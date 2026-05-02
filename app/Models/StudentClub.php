<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'icon',
        'member_count', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}