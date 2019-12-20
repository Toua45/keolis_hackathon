<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class StationService
{
    public function getStations(): array
    {

        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?apikey=289cad31eb950033126984e663a0e35a82394938ea542d4cabf4c095&dataset=liste-des-stations-velo-2018-orleans-metropole&rows=35');
        $content = $response->toArray();
        foreach ($content['records'] as $station) {
            $stations[$station['fields']['nomstation']] = [$station['fields']['latitude'], $station['fields']['longitude']];
        }


        return $stations;
    }
}