<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'amount',
        'id_user',
        'id_campaign',
        'sukuk',
        'administration_fee',
        'is_active',
    ];
}
