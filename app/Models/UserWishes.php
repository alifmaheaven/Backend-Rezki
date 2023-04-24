<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWishes extends Model
{
    use HasFactory;
    protected $table = 'user_wishes';
    protected $fillable = [
        'id_user',
        'id_wish',
        'is_active',
    ];
}
