<?php
namespace App\Helper;

class TapTalk {
    private $api_key;

    public function __construct() {
        $this->api_key = env('TAPTALK_API_KEY', 'e76558b14f95cc32bea7aec24c9fbd7cc8166706b9e3a7757e2bba729d21e8ae');
    }

    public function sendMessage($phone_number, $message) {

        $phone_number = $this->phone_format($phone_number);
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'POST',
            'https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp',
            [
                'headers' => [
                    'API-Key' => $this->api_key,
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'taptalk.io',
                ],
                'json' => [
                    'phone' => $phone_number,
                    'messageType' => 'otp',
                    'body' => $message,
                ]
            ]
        );

        return $response;
    }

    public function phone_format($phone)
    {
        // buat dengan format +62
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);

        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }

        if (substr($phone, 0, 2) == '62') {
            $phone = '+' . $phone;
        } else {
            $phone = '+62' . $phone;
        }

        return $phone;
    }
}
