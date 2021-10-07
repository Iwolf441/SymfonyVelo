<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/",name="home")
     */
    public function home(): Response {
        return new Response("<h1>Home</h1></body>");
    }

    /**
     * @Route("/category/{id}",name="category")
     */
    public function category($id): Response {
        return new Response("<h1>Catégorie</h1></body>");
    }

    /**
     * @Route("/search",name="search")
     */

    public function search(): Response {
        return new Response("<h1>Search</h1></body>");
    }
}