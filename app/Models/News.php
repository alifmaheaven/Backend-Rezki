<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'tittle',
        'body',
        'author',
        'publish_date',
        'banner',
        'id_user',
        'is_active',
    ];
}
