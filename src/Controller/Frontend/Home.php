<?php
namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Home extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function home()
    {
        return $this->render('Frontend/PageAccueil.html.twig');
    }
}
