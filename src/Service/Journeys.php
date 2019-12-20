<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class Journeys
{
    public function getJourneys(string $lat1, string $lng1, string $lat2, string $lng2): array
    {
        $client = HttpClient::create();
        $token = 'a3653e1d-06a1-4edc-b768-c9bd561d3251';
        $response = $client->request('GET', 'https://' . $token . '@api.navitia.io/v1/coverage/fr-cen/journeys', [
                'query' => [
                    'from' => $lng1 . ';' . $lat1,
                    'to' => $lng2 . ';' . $lat2,
                    'first_section_mode[]' => 'bss',
                    'bss_stands' => true,
                ]
            ]
        );
        $content = $response->toArray();

        return $content['journeys'];
    }

}