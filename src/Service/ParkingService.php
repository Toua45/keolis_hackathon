<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class ParkingService
{
    public function getInfoParking(): array
    {

        // TODO uncomment when api keolis up
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?apikey=289cad31eb950033126984e663a0e35a82394938ea542d4cabf4c095&dataset=mobilite-places-disponibles-parkings-en-temps-reel&rows=25');
        $content = $response->toArray();
        for($i=0; $i<count($content['records']); $i++){
            $infoParking[] = $content['records'][$i]['fields'];
        }
        return $infoParking;
        return [];
    }
}
