<?php
namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\CocktailsAlcool;

class ListesCocktails extends AbstractController
{
    /**
     * @Route("/cocktails_alcool",name="cocktail_alcool")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cocktailsAvecAlcool()
    {
        $entitymanager = $this->getDoctrine()->getManager();

        $cocktailsvodka = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'vodka']);
        $cocktailsgin = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'gin']);
        $cocktailsrhum = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'rhum']);
        $cocktailstequila = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'tequila']);
        $cocktailswhisky = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'whiskies']);
        $cocktailsspirit = $entitymanager->getRepository(CocktailsAlcool::class)->findBy(['Alcool' => 'spiritueux']);

        return $this->render('Frontend/ListesCocktailsAlcool.html.twig', [
            'cocktailsVodka' => $cocktailsvodka,
            'cocktailsGin' => $cocktailsgin,
            'cocktailsRhum' => $cocktailsrhum,
            'cocktailsTequila' => $cocktailstequila,
            'cocktailsWhiskies' => $cocktailswhisky,
            'cocktailsAutresSpiritueux' => $cocktailsspirit,
        ]);
    }

    /**
     * @Route("/cocktails_sans_alcool",name="cocktail_sans_alcool")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sansAlcool()
    {
        return $this->render('Frontend/ListesCocktailsSansAlcool.html.twig');
    }
}
