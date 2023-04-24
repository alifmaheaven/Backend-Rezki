<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActive extends Model
{
    use HasFactory;
    protected $table = 'user_actives';
    protected $fillable = [
        'phone_number',
        'email',
        'id_card',
        'tax_registration_number',
        'is_active',
    ];
}
