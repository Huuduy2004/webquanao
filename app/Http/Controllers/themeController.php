<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class themeController extends Controller
{
    public function index(Request $request){
        $theme = $request->input('theme');
        if($theme == 'dark'){
            $request->session()->put('theme','dark');
        }  else {
            $request->session()->put('theme','light');
        }
        return redirect()->back();
    }
}
