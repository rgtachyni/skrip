<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role_id == '1') {
            return redirect()->route('akun');
        }
        return view('admin.dashboard');
    }
}
