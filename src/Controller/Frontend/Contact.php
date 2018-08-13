<?php
namespace App\Controller\Frontend;

use App\Form\ContactFormType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Contact extends AbstractController
{
    /**
     * @Route("/Contact", name="contact")
     */
    public function pageContact(Request $request, \Swift_Mailer $mailer)
    {
        $newmessage = new \App\Entity\Contact();
        $formcontact = $this->createForm(ContactFormType::class, $newmessage);

        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {
            $message = (new \Swift_Message($formcontact['objet']->getdata()))
                ->setFrom($formcontact['email']->getdata())
                ->setTo('clementrmd33@gmail.com')
                ->setBody($formcontact['contenu']->getdata())
            ;

            $mailer->send($message);

            $this->addFlash(
                'Informations',
                'Le message a bien été envoyé'
            );
            return $this->redirectToRoute('contact');
        }
        return $this->render('Frontend/Contact.html.twig', [
            'formcontact' => $formcontact->createView()
        ]);
    }
}
