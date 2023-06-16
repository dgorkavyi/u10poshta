<?php

namespace App\Components;

use GuzzleHttp\Client;

abstract class OrderDelivery
{
    public Client $client;
    public string $url;
    public string $body;
    abstract public function __construct(array $body);
    public function send(): int
    {
        $response = $this->client->request('POST', $this->url, ['body' => $this->body]);
        return $response->getStatusCode();
    }
}