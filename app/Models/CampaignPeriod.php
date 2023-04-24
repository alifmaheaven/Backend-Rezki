<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPeriod extends Model
{
    use HasFactory;
    protected $table = 'campaign_periods';

    protected $fillable = [
        'period',
        'profit_share',
        'expected_roi',
        'is_active',
    ];
}
