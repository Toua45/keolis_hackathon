<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class Journeys
{
    public function getJourneys() : array
    {
        $client = HttpClient::create();

        $response = $client->request('GET', 'https://a3653e1d-06a1-4edc-b768-c9bd561d3251@api.navitia.io/v1/coverage/fr-cen/journeys?from=1.894083804423962%3B47.91724230220881&to=1.906381646633129%3B47.89467245429174&first_section_mode%5B%5D=bss&bss_stands=true&'

        );
        $content = $response->toArray();

        return $content['journeys'];
    }

    public function getCo2(): int
    {
        $journeys = $this->getJourneys();
        $journeys[0]['co2_emission']['value'];
    }
}