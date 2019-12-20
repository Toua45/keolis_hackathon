<?php


namespace App\Controller;


use App\Form\TravelType;
use App\Service\Journeys;
use App\Service\StationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    /**
     * @Route("/trip/", name="trip_index")
     */
    public function index(Request $request, StationService $stationService ,Journeys $journeysService): Response
    {

        $form = $this->createForm(TravelType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stations =  $stationService->getStations();
            $start =$stations[$form->getData()['start']];
            $finish = $stations[$form->getData()['finish']];

            $journeys = $journeysService->getJourneys(
                $start[0],
                $start[1],
                $finish[0],
                $finish[1]
            );

        }

        return $this->render('Trip/index.html.twig', [
            'journeys' => $journeys ?? [],
            'form' => $form->createView(),
        ]);
    }
}