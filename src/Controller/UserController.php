<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{


    const LEVEL_COEFF = 1000;

    /**
     * @Route("/gain/{points}", name="gain")
     * @param User $user
     * @return Response
     */
    public function gain(int $points, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();





        $user->setXp( $user->getXp() + $points);
        $entityManager->persist($user);
        $entityManager->flush();



        //niveau récupéré
//        ceil($user->getXp() / self::LEVEL_COEFF);
        //nb points


        return $this->render ('score/index.html.twig');
    }

}
