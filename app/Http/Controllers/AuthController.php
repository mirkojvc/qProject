<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Submit login form
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function submitLogin(LoginRequest $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $remember = $request->has('remember');
            if (AuthService::login($email, $password, $remember)) {
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', 'Invalid email or password.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'An error occurred while logging in.');
        }

    }

    public static function logout()
    {
        AuthService::logout();
        return redirect()->route('login');
    }
}