<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaigns';

    protected $fillable = [
        'name',
        'description',
        'type',
        'target_funding_amount',
        'current_funding_amount',
        'start_date',
        'closing_date',
        'return_investment_period',
        'status',
        'document_name',
        'document_url',
        'category',
        'id_campaign_period',
        'id_user',
        'is_approved',
        'max_sukuk',
        'id_campaign_banner',
        'is_active',
    ];
}
