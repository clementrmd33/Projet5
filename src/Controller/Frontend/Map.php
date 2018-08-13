<?php
namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Bars;

class Map extends AbstractController
{
    /**
     * @Route ("/carte_des_bars")
     * @return Response
     */
    public function carteJson()
    {
        return $this->render("Frontend/Map.html.twig");
    }

    /**
     * @Route("/carte_des_bars/info")
     * @return Response
     */
    public function infoJson()
    {
        $infocarte = $this->getDoctrine()->getManager()->getRepository(Bars::class)->findAll();

        $datainfo = $this->get('serializer')->serialize($infocarte, 'json');

        $response = new Response($datainfo);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
