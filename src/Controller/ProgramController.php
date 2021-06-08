<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    /**
     * @Route("/programs", name="program_")
     */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'controller_name' => 'ProgramController',
        ]);
    }
    /**

     * @Route("/programs/{id}", methods={"GET"}, requirements={"page"="\d+"}, name="show")

     */

    public function show(int $id): Response
    { {
            return $this->render('program/show.html.twig', [
                'id' => $id,
            ]);
        }
        // ...
    }
}