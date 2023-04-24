<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    use HasFactory;
    protected $table = 'user_banks';
    protected $fillable = [
        'bank_name',
        'account_number',
        'account_name',
        'is_active',
    ];
}
