<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class ParkingService
{
    public function getInfoParking(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=mobilite-places-disponibles-parkings-en-temps-reel');
        $content = $response->toArray();
        for($i=0; $i<count($content['records']); $i++){
            $infoParking[] = $content['records'][$i]['fields'];
        }
        return $infoParking;
    }
}