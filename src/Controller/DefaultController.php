<?php

namespace App\Controller;

use App\Entity\Advert;
use App\Repository\AdvertRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

        return $this->render('/pages/categories.html.twig');
    }
    /**
     * @Route("/search",name="search")
     */
    public function search(AdvertRepository $ar): Response {
        $adverts = $ar->findAll();
        return new Response("<h1>Search</h1></body>");
    }
    /**
     * @Route("/a/{id}",name="view_advert")
     */

    public function viewAdvert(int $id, AdvertRepository $advertRepository): Response
    {
        $advert = $advertRepository->find($id);
        if($advert==null)
        {
            throw new NotFoundHttpException("advert inexistante");
        }
        return new Response("<h1>Annonces n".$advert->getTitle()."</h1>");
    }

    /**
     * @Route("/new-a",name="create_advert")
     */

    public function createAdvert(EntityManagerInterface $em): Response
    {
        $advert = new Advert();
        $advert->setAuthor("Marcel");
        $advert->setDescription("Une description");
        $advert->setTitle("Annonce 1");
        $advert->setDate(new \DateTime());

        $em->persist($advert);
        $em->flush();
        return new Response("<h1>Tentative création annonce</h1>");
    }
}