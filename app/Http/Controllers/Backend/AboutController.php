<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('backend.website.about.index');
    }

    public function update(Request $request){
        update_static_option('website_about', $request->about);
        return back()->withToastSuccess('About updated');
    }
}
