<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App_Videos;
use App\Models\App_Month;
use App\Models\App_Newskill_Actions;

class AppVideosController extends Controller
{
    public function index()
    {
        return App_Videos::all();
    }
}
