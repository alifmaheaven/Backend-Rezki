<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'payment_method',
        'service_fee',
        'status',
        'id_user',
        'id_campaign',
        'is_active',
    ];
}
