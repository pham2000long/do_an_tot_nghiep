<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Mail\SendLinkResetPass;
use App\Repositories\PasswordResetContract;
use App\Repositories\UserContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $userRepository;
    protected $passwordResetRepository;

    /**
     * create a new instance
     *
     * @param UserContract $userRepository
     * @param PasswordResetContract $passwordResetRepository
     */
    public function __construct(
        UserContract $userRepository,
        PasswordResetContract $passwordResetRepository
    ) {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login.index');
    }

    public function forgotPass()
    {
        return view('admins.forgot_password');
    }

    public function sendLink(Request $request)
    {
        $user = $this->userRepository->findByEmail($request->email);
        if (!empty($user) && $user->active) {
            try {
                $passwordReset = $this->passwordResetRepository->updateOrCreate(
                    ['email' => $user->email],
                    ['token' => generateHashToken()]
                );

                // send mail reset password to user
                Mail::send(new SendLinkResetPass($passwordReset));
            } catch (\Throwable $th) {
                dd($th);
                \Log::error($th);
                return redirect()->back()->with([
                    'error' => 'Đã xảy ra lỗi hệ thống! Không thể gửi mail reset password!'
                ]);
            }
        }

        return redirect()->route('auth.login.index')->with([
            'success' => 'Bạn kiểm tra email để thực hiện đổi mật khẩu!'
        ]);
    }

    public function resetPass($token)
    {
        return view('admins.reset_password', compact('token'));
    }

    public function updatePass(Request $request)
    {
        # find passwordReset has token in URL link
        $passwordReset = $this->passwordResetRepository->findByToken($request->token);
        if (empty($passwordReset)) {
            return redirect()->back()->with([
                'error' => 'Token không tồn tại!'
            ]);
        }
        $user = $this->userRepository->findByEmail($passwordReset->email);

        if (empty($user)) {
            return redirect()->back()->with([
                'error' => 'Tài khoản không tồn tại!'
            ]);
        }

        DB::beginTransaction();
        try {
            // reset password
            $this->userRepository->update($user, [
                'password' => Hash::make($request->password),
            ]);
            // delete password_resets
            $this->passwordResetRepository->destroy($passwordReset->id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::error($th);
            return redirect()->back()->with([
                'error' => 'Đã xảy ra lỗi hệ thống!'
            ]);
        }

        return redirect()->route('auth.login.index')->with([
            'success' => 'Đôi mật khẩu thành công mời bạn đăng nhập!'
        ]);
    }
}
