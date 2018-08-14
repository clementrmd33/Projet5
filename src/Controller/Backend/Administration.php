<?php
namespace App\Controller\Backend;

use App\Entity\Utilisateurs;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CocktailsAlcool;
use App\Entity\Bars;
use App\Entity\Spiritueux;

class Administration extends Controller
{
    /**
     * @Route("administration", name="Admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function administration(Request $request)
    {
        $entitymanager = $this->getDoctrine()->getManager();

        $listecocktails = $entitymanager->getRepository(CocktailsAlcool::class)->findAll();
        $pagincocktail = $this->get('knp_paginator')->paginate(
            $listecocktails,
            $request->query->get(
                'page',
                1
            ),
            3
        );
        $listebars = $entitymanager->getRepository(Bars::class)->findAll();
        $paginbars = $this->get('knp_paginator')->paginate(
            $listebars,
            $request->query->get(
                'page',
                1
            ),
            1
        );
        $listespiritueux = $entitymanager->getRepository(Spiritueux::class)->findAll();
        $paginspiritueux = $this->get('knp_paginator')->paginate(
            $listespiritueux,
            $request->query->get(
                'page',
                1
            ),
            3
        );
        $listemembres = $entitymanager->getRepository(Utilisateurs::class)->findAll();
        $paginmembres = $this->get('knp_paginator')->paginate(
            $listemembres,
            $request->query->get(
                'page',
                1
            ),
            1
        );
        return $this->render('Backend/Admin.html.twig', [
            'listeCocktailsAdministration' => $pagincocktail,
            'listeBars' => $paginbars,
            'listeSpiritueux' => $paginspiritueux,
            'listeMembres' => $paginmembres,
        ]);
    }
}
