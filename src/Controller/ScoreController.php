<?php

namespace App\Controller;

use App\Repository\UserRepository;
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
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('score/index.html.twig', [
            'users' => $users
        ]);
    }
}
