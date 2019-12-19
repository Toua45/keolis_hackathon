<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class BusService
{
    public function getInfoBus(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=tao_arrets_od&rows=100');
        $content = $response->toArray();
        for($i=0; $i<count($content['records']); $i++){
            $infoBus[] = $content['records'][$i]['fields'];
        }
        return $infoBus;
    }
}
