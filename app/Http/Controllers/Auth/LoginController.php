<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:customer')->except('logout');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // is_disabled check for customer
            if (Auth::guard('customer')->user()->is_disabled == 1) {
                Auth::guard('customer')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'email' => 'Your account has been disabled.'
                ]);
            }
            $request->authenticate();
            $request->session()->regenerate();
            
            return redirect()->route('customer.dashboard');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'email' => 'These credentials do not match our records.'
            ]);
        }
    }
}
