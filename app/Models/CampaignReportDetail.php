<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignReportDetail extends Model
{
    use HasFactory;
    protected $table = 'campaign_report_details';

    protected $fillable = [
        'id_campaign_report',
        'date_time',
        'amount',
        'description',
        'evidence',
        'is_active',
    ];
}
