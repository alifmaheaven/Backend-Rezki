<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserWishes extends Model
{
    use HasFactory;
    protected $table = 'user_wishes';
    protected $fillable = [
        'id_user',
        'id_wish',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function wish()
    {
        return $this->belongsTo(Wish::class, 'id_wish', 'id');
    }

    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->created_by = isset($user->email) ? $user->email : 'system';
           $model->updated_by = isset($user->email) ? $user->email : 'system';
       });
       static::updating(function($model)
       {
           $user = Auth::user();
           $model->updated_by = isset($user->email) ? $user->email : 'system';
           $model->version = $model->version + 1;
       });
   }
}
