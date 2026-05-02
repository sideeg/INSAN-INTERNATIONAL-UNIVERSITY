<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'flag_emoji',
        'student_count', 'is_represented',
    ];

    protected $casts = [
        'is_represented' => 'boolean',
    ];
}