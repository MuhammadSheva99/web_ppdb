<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminWebController extends Controller
{
    public function index()
    {
        return view('web'); // resources/views/web.blade.php
    }
}
