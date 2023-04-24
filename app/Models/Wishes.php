<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishes extends Model
{
    use HasFactory;
    protected $table = 'wishes';
    protected $fillable = [
        'message',
        'is_active',
    ];
}
