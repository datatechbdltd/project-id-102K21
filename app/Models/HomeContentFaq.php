<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentFaq extends Model
{
    use HasFactory;

    //homeContent
    public function homeContent(){
        return $this->belongsTo(HomeContent::class, 'home_content_id', 'id');
    }
}
