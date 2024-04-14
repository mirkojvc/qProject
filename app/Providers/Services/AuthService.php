<?php

namespace App\Providers\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class AuthService {

    /**
     * Login the user over http request and save the token in cookie
     *
     * @param string $email
     * @param string $password
     * @param boolean $remember
     * @return boolean
     */
    public static function login(string $email, string $password, bool $remember = false): string
    {
        $url = config('api.base_uri') . config('api.auth.login');
        $data = ApiService::sendRequest($url, [
            'email' => $email,
            'password' => $password,
        ], 'post');
        $token = $data['token_key'];
        $expires = $data['expires_at'];
        $minutesUntilExpires = 60;
        if($remember) {

            $expiresAt = Carbon::parse($expires);
            $minutesUntilExpires = $expiresAt->diffInMinutes(Carbon::now());
        }
        $user = $data['user'];
        $userData = json_encode($user);

        // we can set Cookie::forever and implement a middleware that auto refreshes the token before it expires
        // but since this is a test, this will do
        Cookie::queue('token', $token, $minutesUntilExpires);
        Cookie::queue('user', $userData, $minutesUntilExpires);

        return $token;
    }

    public static function loginAsAdmin() {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

       $token =  self::login($email, $password, false);

       return $token;
    }

    public static function getCurrentUser()
    {
        return json_decode(Cookie::get('user'));
    }

    /**
     * Check if the user is authenticated
     *
     * @return boolean
     */
    public static function isAuth(): bool
    {
        return Cookie::has('token');
    }

    /**]
     * Get the token from cookie
     */
    public static function getToken(): string
    {
        return Cookie::get('token');
    }

    /**
     * Logout the user by removing the token from cookie
     */
    public static function logout()
    {
        Cookie::queue(Cookie::forget('token'));
        Cookie::queue(Cookie::forget('user'));

    }
}