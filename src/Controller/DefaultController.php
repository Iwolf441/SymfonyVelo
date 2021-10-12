<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */
    public function home(): Response {
        return $this->render('/pages/home.html.twig');
    }

    /**
     * @Route("/category/{id}",name="category")
     */
    public function category($id): Response {
        return new Response("<h1>Catégorie</h1>.</body>");
    }
    /**
     * @Route("/search",name="search")
     */
    public function search(): Response {
        return new Response("<h1>Search</h1></body>");
    }
}
