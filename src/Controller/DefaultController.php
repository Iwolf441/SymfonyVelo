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
        return new Response("<h1>Allez-y,mes brigants</h1></body>");
    }
}