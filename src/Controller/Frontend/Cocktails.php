<?php

namespace App\Controller\Frontend;

use App\Entity\Comments;
use App\Form\CommentType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\CocktailsAlcool;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class Cocktails extends AbstractController
{
    /**
     * @Route("/affichage_cocktails/{id}")
     */
    public function cocktail($id, request $request, ObjectManager $manager, cocktailsAlcool $cocktailAlcool)
    {
        $entitymanager = $this->getDoctrine()->getManager();

        $cocktail = $entitymanager->getRepository(CocktailsAlcool::class)-> find($id);

        $newcom = new Comments();

        $formcom = $this->createForm(CommentType::class, $newCom);

        $formcom->handleRequest($request);

        if($formcom->isSubmitted() && $formcom->isValid())
        {
            $newCom->setCreateAt(new \datetime);
            $newCom->setCocktails($cocktailAlcool);
            $manager->persist($newCom);
            $manager->flush();
        }

        return $this->render('Cocktails/AffichageCocktail.html.twig',array(
            'cocktail'=> $cocktail,
            'form' => $formcom->createView(),
            'comment' => $newCom
        ));
    }
}