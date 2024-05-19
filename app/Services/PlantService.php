<?php

namespace App\Services;

use GuzzleHttp\Client;

class PlantService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://34.134.181.54/api/',
            'timeout' => 15.0,
        ]);
    }

    public function fetchPlants(): array
    {
        $response = $this->client->request('GET', 'plants');
        return json_decode($response->getBody()->getContents(), true);
    }
}
