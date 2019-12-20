<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    const TRIP1 = 7400;
    const TRIP2 = 250;
    const TRIP3 = 150;
    const LEVEL_COEFF = 1000;

    /**
     * @Route("/gain", name="gain")
     * @param User $user
     * @return Response
     */
    public function gain(UserRepository $userRepository): Response
    {

        $user = $userRepository->find(19);
        var_dump($user);


        $xp = $user->getXp() + self::TRIP1;

        $user->setXp($xp);
        //niveau récupéré
        var_dump(ceil($user->getXp() / self::LEVEL_COEFF));
        //nb points
        var_dump($user->getXp());


        return $this->render ('Gain/index.html.twig');
    }

}
