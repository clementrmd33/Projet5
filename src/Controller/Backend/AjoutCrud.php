<?php
namespace App\Controller\Backend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\CocktailsAlcool;
use App\Entity\Bars;
use App\Entity\Spiritueux;

class AjoutCrud extends AbstractController
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Ajout_Cocktail", name="Add_cocktail")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addCocktail(Request $request)
    {
        $newcocktail = new CocktailsAlcool();

        $formcocktail = $this->createFormBuilder($newcocktail)
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
                ]
            ])
            ->getForm();

        $formcocktail->handleRequest($request);

        if ($formcocktail->isSubmitted()&& $formcocktail->isValid()) {
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager -> persist($newcocktail);
            $entitymanager -> flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Cocktails.html.twig', [
            'form' => $formcocktail->createView(),
        ]);
    }

    /**
     * @Route("/Ajout_Spiritueux", name="Add_spirit")
     * @Security("has_role('ROLE_ADMIN')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addSpirit(Request $request)
    {
        $newspirit = new Spiritueux();

        $formspirit = $this->createFormBuilder($newspirit)
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
            $entitymanager=$this->getDoctrine()->getManager();

            $entitymanager->persist($newspirit);
            $entitymanager->flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Spiritueux.html.twig', [
            'form' => $formspirit->createView(),
        ]);
    }

    /**
     * @Route("/Ajout_Bars", name="Add_bar")
     * @Security("has_role('ROLE_ADMIN')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addBars(Request $request)
    {
        $newbars = new Bars();

        $formbars = $this->createFormBuilder($newbars)
            ->add('Nom', TextType::class)
            ->add('Description', TextareaType::class)
            ->add('Adresse', TextareaType::class)
            ->add('lat', TextType::class)
            ->add('lng', TextType::class)
            ->getForm();

        $formbars->handleRequest($request);

        if ($formbars->isSubmitted() && $formbars->isValid()) {
            $entitymanager = $this->getDoctrine()->getManager();

            $entitymanager -> persist($newbars);
            $entitymanager -> flush();

            return $this->redirectToRoute('Admin');
        }

        return $this->render('Backend/Bars.html.twig', array(
            'form' => $formbars->createView(),
        ));
    }
}
