<?php


namespace App\Controller;


use App\Service\Journeys;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    /**
     * @Route("/trip/", name="trip_index")
     */
    public function index(Journeys $journeys): Response
    {


        return $this->render('Trip/index.html.twig', [
            'journeys' => $journeys->getJourneys(),
        ]);
    }
}