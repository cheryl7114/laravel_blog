<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function about()
    {
        return view('about.index');
    }
}
