<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('web.services');
    }
}
