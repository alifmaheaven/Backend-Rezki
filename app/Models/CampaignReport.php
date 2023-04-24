<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    use HasFactory;
    protected $table = 'campaign_reports';

    protected $fillable = [
        'id_campaign',
        'document_name',
        'document_url',
        'is_exported',
        'is_active',
    ];
}
