<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'year', 'photo',
        'linkedin_url', 'email',
        'is_council', 'sort_order',
    ];

    protected $casts = [
        'is_council' => 'boolean',
    ];
}