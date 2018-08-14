<?php
namespace App\Controller\Frontend;

use App\Entity\Spiritueux;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListesSpiritueux extends AbstractController
{
    /**
     * @Route("/Vodka", name="vodka")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function vodka()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $vodka = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'Vodka']);

        return $this->render('Frontend/Vodka.html.twig', [
            'AffichageVodka' => $vodka
        ]);
    }

    /**
     * @Route("/Gin",name="gin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ginspirit()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $ginspirit = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'GIN']);

        return $this->render('Frontend/Gin.html.twig', [
            'AffichageGin' => $ginspirit
        ]);
    }

    /**
     * @Route("/Rhum",name="rhum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rhum()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $rhumspirit = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'RHUM']);

        return $this->render('Frontend/Rhum.html.twig', [
            'AffichageRhum' => $rhumspirit
        ]);
    }

    /**
     * @Route("/Whiskies",name="whiskies")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function whiskies()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $whiskies = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'WHISKIES']);

        return $this->render('Frontend/Whiskies.html.twig', [
            'AffichageWhiskies' => $whiskies
        ]);
    }

    /**
     * @Route("/Tequila",name="tequila")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tequila()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $tequila = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'TEQUILA']);

        return $this->render('Frontend/Tequila.html.twig', [
            'AffichageTequila' => $tequila
        ]);
    }

    /**
     * @Route("/Autres_spiritueux",name="autres_spirit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function autresSpiritueux()
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $autresspiritueux = $entitymanager->getRepository(Spiritueux::class)->findBy(['Nom'=>'Vodka']);

        return $this->render('Frontend/AutresSpiritueux.html.twig', [
            'AffichageAutresSpiritueux' => $autresspiritueux
        ]);
    }
}
