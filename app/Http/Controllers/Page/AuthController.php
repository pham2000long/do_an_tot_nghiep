<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Mail\SendPassword;
use App\Repositories\UserContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('pages.login_or_register');
    }

    public function register(Request $request)
    {
        $password = Str::random(8);
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'active' => true,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
                'role' => $request->role
            ]);
            // send mail order to user
            Mail::send(new SendPassword($user, $password));
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with([
                'error' => 'Đã xảy ra lỗi hệ thống!'
            ]);
        }
        return redirect()->back()->with([
            'success' => 'Quý khách đăng ký tài khoản thành công! Xin kiểm tra mail để lấy mật khẩu đăng nhập!'
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
