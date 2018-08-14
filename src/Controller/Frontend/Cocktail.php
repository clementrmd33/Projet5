<?php
namespace App\Controller\Frontend;

use App\Entity\Comments;
use App\Form\CommentType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\CocktailsAlcool;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class Cocktail extends AbstractController
{
    /**
     * @Route("/affichage_cocktails/{id}")
     */
    public function cocktail($id, Request $request, ObjectManager $manager, CocktailsAlcool $cocktailAlcool)
    {
        $entitymanager = $this->getDoctrine()->getManager();

        $cocktail = $entitymanager->getRepository(CocktailsAlcool::class)-> find($id);

        $newcom = new Comments();

        $formcom = $this->createForm(CommentType::class, $newcom);

        $formcom->handleRequest($request);

        if ($formcom->isSubmitted() && $formcom->isValid()) {
            $newcom->setCreateAt(new \datetime);
            $newcom->setCocktails($cocktailAlcool);
            $manager->persist($newcom);
            $manager->flush();
        }

        return $this->render('Frontend/Cocktail.html.twig', [
            'cocktail'=> $cocktail,
            'comment' => $newcom,
            'form' => $formcom->createView()
        ]);
    }
}
