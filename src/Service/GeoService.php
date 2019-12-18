<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class GeoService
{
    public function getCoordinates() : array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=mobilite-places-disponibles-parkings-en-temps-reel');
        $content = $response->toArray();
        $coordinates = $content['records'][0]['fiels']['coords'];
        return $coordinates;
    }
}