<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Http;

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

    public function login(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => [
                'required',
                function (string $attribute, mixed $value, Closure $fail) {
                    $g_response = Http::withoutVerifying()->withOptions([
                        'verify' => false,
                    ])->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => env('RECAPTCHA_SECRET_KEY'),
                        'response' => $value,
                        'remoteip' => $_SERVER['REMOTE_ADDR'],
                    ]);
                    if (!$g_response->json('success')) {
                        $fail("The {$attribute} is invalid.");
                    }
                },
            ]
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
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
            return redirect()->route('customer.dashboard');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'email' => 'These credentials do not match our records.'
            ]);
        }
    }
}
