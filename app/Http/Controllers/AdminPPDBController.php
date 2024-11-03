<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPPDBController extends Controller
{
    public function index()
    {
        return view('ppdb'); // resources/views/ppdb.blade.php
    }
}
