<?php

namespace App\Providers\Services;

use Illuminate\Support\Facades\Http;

class ApiService {
    /**
     * Send a request to an API.
     *
     * @param string $url
     * @param array $data
     * @return void
     */
    public static function sendAuthorizedRequest(string $url, array $data = [], string $method = 'get', $token = null) {
        $token = $token !== null ? $token : AuthService::getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->$method($url, $data);

        if($response->status() !== 200 && $response->status() !== 204){
            throw new \Exception(
                'Failed to send request to ' . $url . ' with status code ' . $response->status()
            );
        }
        return $response->json();
    }

    /**
     * Send a request to an API.
     *
     * @param string $url
     * @param array $data
     * @param string $method
     * @return void
     */
    public static function sendRequest(string $url, array $data = [], string $method = 'get') {
        $response = Http::$method($url, $data);
        if($response->status() !== 200) {
            throw new \Exception(
                'Failed to send request to ' . $url . ' with status code ' . $response->status()
            );
        }
        return $response->json();
    }
}
