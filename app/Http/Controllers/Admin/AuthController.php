<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admins.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->remember
        )) {
            if (Auth::user()->active) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()
                    ->with('error', 'Tài khoản của bạn không hoạt động!');
            }
        }

        return redirect()->back()->with('error', 'Tài khoản của bạn không tồn tại');
    }

    public function logout(){
        Auth::logout();
        return view('admins.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
}
