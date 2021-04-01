<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\Partner;
use App\Models\Strength;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $partners = Partner::all();
        $home_contents = HomeContent::orderBy('serial', 'asc')->get();
        $strengths = Strength::all();
        return view('frontend.index', compact('partners', 'home_contents', 'strengths'));
    }
}
