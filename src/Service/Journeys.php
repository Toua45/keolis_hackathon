<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class Journeys
{
    public function getJourneys() : array
    {
        $client = HttpClient::create();

        $response = $client->request('GET', 'https://a3653e1d-06a1-4edc-b768-c9bd561d3251@api.navitia.io/v1/coverage/fr-cen/journeys?from=1.90122%3B47.89428&to=1.90246%3B47.90175&first_section_mode%5B%5D=bss&bss_stands=true&'

        );
        $content = $response->toArray();

        return $content['journeys'];
    }
}