<?php


namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class StationService
{
    public function getStations(): array
    {
        /*$client = HttpClient::create();
        $response = $client->request('GET',
            'https://a3653e1d-06a1-4edc-b768-c9bd561d3251@api.navitia.io/v1/coverage/fr-cen/journeys?from=1.894083804423962%3B47.91724230220881&to=1.906381646633129%3B47.89467245429174&first_section_mode[]=bss&bss_stands=true&');
        $content = $response->toArray();
        foreach ($content['journeys'] as $station) {
            $stations[$station ['sections'][0]['from']['name']] = [$station['sections']['from']['adress']['coord']['lat'], $station['sections']['from']['adress']['coord']['lon']];
        }
        return $stations;*/

        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?apikey=289cad31eb950033126984e663a0e35a82394938ea542d4cabf4c095&dataset=liste-des-stations-velo-2018-orleans-metropole&rows=35');
        $content = $response->toArray();
        foreach ($content['records'] as $station) {
            $stations[$station['fields']['nomstation']] = [$station['fields']['latitude'], $station['fields']['longitude']];
        }
        return $stations;
    }
}