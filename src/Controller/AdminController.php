<?php
namespace App\Controller;

use App\Entity\Comment;
use App\Entity\CommentFlag;
use App\Form\CommentAdminType;
use App\Repository\CommentFlagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin839", name="adminHome")
     */
    public function home(): Response
    {
        return $this->render('pages/admin/home.html.twig');
    }
}
