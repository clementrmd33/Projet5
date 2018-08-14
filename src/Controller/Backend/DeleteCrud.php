<?php
namespace App\Controller\Backend;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\CocktailsAlcool;
use App\Entity\Bars;
use App\Entity\Spiritueux;

class DeleteCrud extends AbstractController
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Delete_cocktails/{id}")
     */
    public function deleteCocktails(CocktailsAlcool $id)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->remove($id);
        $entitymanager->flush();

        return $this->redirectToRoute('Admin');
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Delete_spiritueux/{id}")
     */
    public function deleteSpiritueux(Spiritueux $id)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->remove($id);
        $entitymanager->flush();

        return $this->redirectToRoute('Admin');
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/Delete_bars/{id}")
     */
    public function deleteBars(Bars $id)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->remove($id);
        $entitymanager->flush();

        return $this->redirectToRoute('Admin');
    }
}
