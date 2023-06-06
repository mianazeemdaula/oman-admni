<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alkoumi\LaravelArabicNumbers\Numbers;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
