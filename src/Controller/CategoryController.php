<?php

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categories", name="category_")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $category = $this->getDoctrine()

            ->getRepository(Category::class)

            ->findAll();


        return $this->render(
            'category/index.html.twig',
            ['category' => $category]
        );
    }

    /**
     * @Route ("/{categoryName}", methods={"GET"}, name="show")
     */
    public function show(string $categoryName): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);



        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(
                [
                    'category' => $categories->getId()
                ],
                [
                    'id' => 'DESC'
                ],
                3
            );

        return $this->render('category/show.html.twig', [
            'categories' => $categories,
            'programs' => $programs,
        ]);
    }
}