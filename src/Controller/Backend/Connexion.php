<?php

namespace App\Controller\Backend;

use App\Entity\Utilisateurs;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Connexion extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $newusers = new Utilisateurs();
        $forminscription = $this->createForm(InscriptionType::class, $newusers);

        $forminscription->handleRequest($request);

        if ($forminscription->isSubmitted() && $forminscription->isValid()) {
            $hashpassword = $encoder->encodePassword($newusers, $newusers->getPassword());

            $newusers->setPassword($hashpassword);
            /*$newusers->addRole("ROLE_USER");*/
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newusers);
            $manager->flush();

            $message = (new \Swift_Message('Confirmation inscription'))
                ->setFrom('alambic@webmaster-rmd.fr')
                ->setTo($forminscription['email']->getdata())
                ->setBody('Votre inscrption a bien été effectué')
            ;
            $mailer->send($message);
            return $this->redirectToRoute('connect');
        }
        return $this->render('Frontend/CreationMembre.html.twig', [
            'form' => $forminscription->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="connect")
     */
    public function connectAction()
    {
        return $this->render('Frontend/Connexion.html.twig');
    }

    /**
     * @Route("/deconnexion", name="logout")
     */
    public function logoutAction()
    {
    }
}
