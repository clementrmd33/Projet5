<?php
namespace App\Controller\Backend;

use App\Entity\Utilisateurs;
use App\Form\ResetPasswordType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetPassword extends AbstractController
{
    /**
     * @Route("/reset-password", name="reset_password")
     * @throws
     */
    public function resetPassword(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $formreset = $this->createForm(ResetPasswordType::class);

        $formreset->handleRequest($request);
        if ($formreset->isSubmitted() && $formreset->isValid()) {
            $emailclient = $formreset['email']->getdata();

            $entitymanager = $this->getDoctrine()->getManager();
            $updateemail = $entitymanager->getRepository(Utilisateurs::class)->findOneBy(['email' => $emailclient]);
            $userupdate = new Utilisateurs();

            $newpass = bin2hex(random_bytes(10));
            $hashpassword = $encoder->encodePassword($userupdate, $newpass);
            $updateemail->setPassword($hashpassword);

            $entitymanager->persist($updateemail);
            $entitymanager->flush();

            $message = (new \Swift_Message('Reinitialisation mot de passe'))
                ->setFrom('clementrmd33@gmail.com')
                ->setTo($emailclient)
                ->setBody($this->renderView(
                    'Backend/MessagePassword.html.twig',
                    ['nouveauPass' => $newpass, 'form' => $formreset->createView()]
                ), 'text/html');

            $mailer->send($message);

            return $this->redirectToRoute('connect');
        }

        return $this->render('Frontend/ModificationPassword.html.twig', [
            'formreset' => $formreset->createView()
        ]);
    }
}
