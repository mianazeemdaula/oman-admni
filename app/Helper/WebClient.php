<?php
namespace App\Helper;
use Illuminate\Support\Facades\Http;

class WebClient {
    static $path = "https://omani-cultural-heritage.mht-gov.com/api/";

    protected function header(){
        return [
        'Authorization' =>  'Bearer '.session('token'),
        "Accept" => "application/json",
        ];
    }
    static function get($url)  {
        $response = Http::get($this->path.$url);
        return $response;
    }

    static function post($url, $body)  {
        $response = Http::withHeaders([
            'Authorization' =>  'Bearer '.session('token'),
            "Accept" => "application/json",
            ])->post(WebClient::$path.$url, $body);
        return $response;
    }
}