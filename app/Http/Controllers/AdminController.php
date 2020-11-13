<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }

    public function users(Request $request)
    {
        return view('admin.user.index');
    }

    public function premiumusers(Request $request)
    {
        return view('admin.user.index');
    }
}
