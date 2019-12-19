<?php

namespace App\Controller;

use App\Service\MapService;
use App\Service\ParkingService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class MapController extends AbstractController
{
    /**
     * @Route("/map", name="map")
     * @return Response
     */
    public function index(MapService $mapService, ParkingService $parkingService): Response
    {
        $infoStations = $mapService->getInfoStations();
        $infoParkings = $parkingService->getInfoParking();
        return $this->render('map.html.twig', [
            'infoStations' => $infoStations,
            'infoParkings' => $infoParkings,
        ]);
    }
}
