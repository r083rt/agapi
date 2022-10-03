<?php
namespace App\Helper;

use GuzzleHttp\Client;

class PushNotif
{
    public $url = "https://exp.host/--/api/v2/push/send";
    public $token;
    public $title;
    public $body;
    public $data;

    public function __construct($token, $title, $body, $data)
    {
        $this->token = $token;
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
    }

    public function send()
    {
        $client = new Client();
        $response = $client->request('POST', $this->url, [
            'json' => [
                'to' => $this->token,
                'title' => $this->title,
                'body' => $this->body,
                'data' => $this->data,
            ],
        ]);
        return $response->getBody();
    }
}
