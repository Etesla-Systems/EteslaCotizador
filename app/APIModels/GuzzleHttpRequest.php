<?php

namespace App\APIModels;

use GuzzleHttp\Client;

class GuzzleHttpRequest
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function get($url)
    {
        $response = $this->client->request('GET', $url);

        return json_decode( $response->getBody()->getContents() );
    }

    protected function put($url, $request)
    {
        $response = $this->client->request('PUT', $url, $request);

        return json_decode( $response->getBody()->getContents() );
    }

    protected function post($url, $request)
    {
        $response = $this->client->request('POST', $url, $request);

        return json_decode( $response->getBody()->getContents() );
    }
}
