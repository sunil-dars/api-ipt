<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppVideos extends Model
{
    use HasFactory;
    public static $rules = array(
        'app_type' => 'required',
    );
    public static $messages = array(
		'app_type' => 'Please enter app type.',
    );

    public function appMonts()
    {
        return $this->hasMany(AppMonths::class);
    }

    public function AppCategory()
    {
        return $this->hasMany(AppCategory::class);
    }
}
