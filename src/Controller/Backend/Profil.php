<?php
namespace App\Controller\Backend;

use App\Entity\Utilisateurs;
use App\Form\ProfilType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Profil extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function affichageProfil(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $formprofil = $this->createForm(ProfilType::class);

        $formprofil->handleRequest($request);
        if ($formprofil->isSubmitted() && $formprofil->isValid()) {
            $emailclient = $formprofil['email']->getdata();
            $passwordclient = $formprofil['password']->getdata();

            $entitymanager= $this->getDoctrine()->getManager();
            $email = $entitymanager->getRepository(Utilisateurs::class)->findOneBy(['email' => $emailclient]);

            $usermodif = new Utilisateurs();
            $hashpassword = $encoder->encodePassword($usermodif, $passwordclient);
            $email->setPassword($hashpassword);

            $entitymanager->persist($email);
            $entitymanager->flush();

            $message = (new \Swift_Message('Modification du mot de passe'))
                ->setFrom('clementrmd33@gmail.com')
                ->setTo($emailclient)
                ->setBody(
                    'Votre mot de passe à bien été modifié '
                );
            ;

            $mailer->send($message);

            return $this->redirectToRoute('accueil');
        }
        return $this->render('Frontend/ProfilClient.html.twig', [
            'form' => $formprofil->createView()
        ]);
    }
}
