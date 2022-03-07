<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admins.dashboard', [
                'title' => 'Dashboard'
            ]);
        }
        return view('admins.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

}
