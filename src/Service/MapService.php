<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class MapService
{
    public function getInfoStations(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=liste-des-stations-velo-2018-orleans-metropole&rows=35&sort=-id');
        $content = $response->toArray();
        for($i=0; $i<count($content['records']); $i++){
            $infoStations[] = $content['records'][$i]['fields'];
        }
        return $infoStations;
    }
}
