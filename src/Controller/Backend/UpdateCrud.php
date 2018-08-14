<?php
namespace App\Controller\Backend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\CocktailsAlcool;
use App\Entity\Spiritueux;
use App\Entity\Bars;

class UpdateCrud extends AbstractController
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Modification_cocktails/{id}")
     */
    public function updateCocktails(Request $request, CocktailsAlcool $id)
    {
        $formcocktails = $this->createFormBuilder($id)
            ->add('Nom', TextType::class)
            ->add('Recette', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])
            ->add('Decoration', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])
            ->add('Histoire', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])
            ->add('Elaboration', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])

            ->add('Alcool', ChoiceType::class, [
                'choices' => [
                    'vodka' => 'vodka',
                    'rhum'=> 'rhum',
                    'gin'=> 'gin',
                    'tequila'=>'tequila',
                    'whiskies'=> 'whiskies',
                    'autres'=>'autres',
                ],
            ])
            ->getForm();

        $formcocktails->handleRequest($request);

        if ($formcocktails->isSubmitted() && $formcocktails->isValid()) {
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager -> persist($id);
            $entitymanager -> flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Cocktails.html.twig', [
            'form' => $formcocktails->createView(),
        ]);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Modification_spiritueux/{id}")
     */
    public function updateSpiritueux(Request $request, Spiritueux $id)
    {
        $formspirit = $this->createFormBuilder($id)
            ->add('Nom', TextType::class)
            ->add('Histoire', TextareaType::class)
            ->add('Elaboration', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])
            ->add('Lieuproduction', TextType::class)
            ->add('Marques', TextType::class)
            ->getForm();

        $formspirit->handleRequest($request);

        if ($formspirit->isSubmitted() && $formspirit->isValid()) {
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager -> persist($id);
            $entitymanager -> flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Spiritueux.html.twig', [
            'form' => $formspirit->createView(),
        ]);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Modification_bars/{id}")
     */
    public function updateBars(Request $request, Bars $id)
    {
        $formbars = $this->createFormBuilder($id)
            ->add('Nom', TextType::class)
            ->add('Description', TextareaType::class, [
                'attr' => ['class' => 'ckeditor']
            ])
            ->add('Adresse', TextareaType::class)
            ->getForm();

        $formbars->handleRequest($request);

        if ($formbars->isSubmitted() && $formbars->isValid()) {
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager -> persist($id);
            $entitymanager -> flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Bars.html.twig', array(
            'form' => $formbars->createView(),
        ));
    }
}
