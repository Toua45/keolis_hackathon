<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class MapService
{
    public function getInfoStations(): array
    {
        // TODO uncomment when api keolis up
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?apikey=289cad31eb950033126984e663a0e35a82394938ea542d4cabf4c095&dataset=liste-des-stations-velo-2018-orleans-metropole&rows=35');
        $content = $response->toArray();
        for($i=0; $i<count($content['records']); $i++){
            $infoStations[] = $content['records'][$i]['fields'];
        }
        return $infoStations;

        return [];
    }
}
