<?php

namespace App\Controller;

use App\Entity\Advert;
use App\Form\AdvertType;
use App\Repository\AdvertRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
        $adverts = $ar->findAllWithCategories();
        return $this->render('/pages/search.html.twig',['adverts'=> $adverts]);
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
        return $this->render('pages/advert.html.twig',['advert' => $advert]);
    }
    /**
     * @Route("/new-a",name="create_advert")
     */
    public function createAdvert(Request $request, EntityManagerInterface $em): Response
    {
        $advert = new Advert();
        $form = $this->createForm(AdvertType::class, $advert);
        $form->handleRequest($request);

        if($form->isSubmitted()  && $form->isValid())
        {
            $em->persist($advert);
            $em->flush();
            return $this->redirectToRoute('view_advert', ['id' => $advert->getId()]);
        }
        return $this->render('pages/create-advert.html.twig',['advertForm'=> $form->createView()]);
    }

    /**
     * @Route("/edit-a/{id<\d+>}", name="edit_advert")
     */
    public function editAdvert(int $id, Request $request, AdvertRepository $advertRepository, EntityManagerInterface $em): Response
    {
        $advert = $advertRepository->find($id);
        $form = $this->createForm(AdvertType::class, $advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($advert);
            $em->flush();
            return $this->redirectToRoute('view_advert', ['id' => $advert->getId()]);
        }
        return $this->render('pages/create-advert.html.twig', ['advertForm' => $form->createView()]);

    }


}
