<?php

namespace App\Controller;

use App\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    public function index(): Response
    {
        return $this->render('actor/index.html.twig', [
            'controller_name' => 'ActorController',
        ]);
    }

    /**
     * @Route ("actor/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     */
    public function show(Actor $actor): Response
    {

        $programs = $actor->getPrograms();

        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
            'programs' => $programs,
        ]);
    }
}