<?php

namespace App\Controller;

use App\Service\MapService;
use App\Service\ParkingService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class ScoreController extends AbstractController
{
    /**
     * @Route("/score", name="score_index")
     */
    public function index(): Response
    {
        return $this->render('score/index.html.twig', [
        ]);
    }
}
