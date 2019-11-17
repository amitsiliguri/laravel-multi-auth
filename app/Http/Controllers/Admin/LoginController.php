<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;
    public function __construct()
    {
        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            $this->username() => 'required|email',
            'password' => 'required|min:8|max:20'
        ]);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            $this->clearLoginAttempts($request);
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->put('admin.email',$request->email);
        return redirect()->intended(route('admin.dashboard'));
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        if ($request->session()->get('web') != 1) {
            $request->session()->invalidate();
        }
        return redirect('/admin/login');
    }
}
