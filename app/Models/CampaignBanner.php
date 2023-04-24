<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignBanner extends Model
{
    use HasFactory;
    protected $table = 'campaign_banners';
    protected $fillable = [
        'name',
        'url',
        'is_active',
    ];
}
