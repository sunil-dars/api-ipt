<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppMonths extends Model
{
    use HasFactory;

    public function appvideos() {
        return $this->belongsToMany( AppVideos::class )
            ->withTimestamps();
    }
}
