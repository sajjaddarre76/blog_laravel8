<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PagesController extends Controller
{
    public function index()
    {
        print_r(Artisan::queue('show:product'));
        return view('index');
    }
}
