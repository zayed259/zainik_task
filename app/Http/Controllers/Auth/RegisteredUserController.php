<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'details' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
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

        // dd($request->all());
        $avatarName = $request->name . '_' . time() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'details' => $request->details,
            'avatar' => $avatarName,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($customer));

        Auth::guard('customer')->login($customer);

        return redirect(RouteServiceProvider::CUSTOMER_HOME);
    }
}
