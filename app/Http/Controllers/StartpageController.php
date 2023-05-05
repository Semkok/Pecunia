<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartpageController extends Controller
{
    public function userhome(){
        return view('welcome');
    }
}
