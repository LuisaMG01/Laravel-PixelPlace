<?php

namespace App\Services;

use GuzzleHttp\Client;

class MarvelService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://gateway.marvel.com/v1/public/',
            'timeout'  => 15.0,
        ]);
    }

    public function fetchCharacters(string $publicKey, string $privateKey): array
    {
        $timestamp = time();
        $hash = md5($timestamp . $privateKey . $publicKey);

        $response = $this->client->request('GET', 'characters', [
            'query' => [
                'apikey' => $publicKey,
                'ts' => $timestamp,
                'hash' => $hash,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true)['data']['results'];
    }
}
