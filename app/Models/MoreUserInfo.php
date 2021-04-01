<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreUserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'phone',
        'address',
        'facebook',
        'twitter',
        'youtube',
        'map',
        'user_id'
    ];

    //user
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
