<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class StationBusService
{
    public function getStationsBus(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=mobilite-places-disponibles-parkings-en-temps-reel&rows=25');
        $content = $response->toArray();
        foreach ($content['records'] as $stationCar) {
            $stationsCar[$stationCar['fields']['name']] = [$stationCar['fields']['coords']['0'], $stationCar['fields']['coords']['1']];
        }
        return $stationsCar;
    }
}