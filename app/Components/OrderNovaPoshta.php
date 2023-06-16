<?php

namespace App\Components;
use App\Components\OrderDelivery;
use GuzzleHttp\Client;

class OrderNovaPoshta extends OrderDelivery {
    public function __construct(array $body)
    {
        $this->url = "https://novaposhta.test/api/delivery";
        $this->body = json_encode($body);
        $this->client = new Client(['base_url' => $this->url]);
    }
}