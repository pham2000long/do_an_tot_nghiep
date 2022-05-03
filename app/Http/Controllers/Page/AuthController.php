<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login_or_register');
    }

    public function register()
    {
        return view('pages.login_or_register');
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
                return redirect()->route('home.index');
            } else {
                return redirect()->back()
                    ->with('error', 'Tài khoản của bạn không hoạt động!');
            }
        }

        return redirect()->back()->with('error', 'Tài khoản của bạn không tồn tại');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
}
