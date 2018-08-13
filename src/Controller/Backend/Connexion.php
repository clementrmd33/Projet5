<?php

namespace App\Controller\Backend;

use App\Entity\Utilisateurs;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Connexion extends Controller
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
                ->setFrom('clementrmd33@gmail.com')
                ->setTo($forminscription['email']->getdata())
                ->setBody('Votre inscrption a bien été effectué')
            ;
            $mailer->send($message);
            return $this->redirectToRoute('connect');
        }
        return $this->render('Frontend/creationMembre.html.twig', [
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
