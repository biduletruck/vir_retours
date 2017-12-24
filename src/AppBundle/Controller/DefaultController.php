<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/scan", name="scanbar")
     */
    public function scanAction(Request $request)
    {

        return $this->render('test/scan.html.twig');
    }


    /**
     * Rechercher un colis à staocker.
     *
     * @Route("/stockage", name="emplacement_stockage")
     */
    public function stockageAction(Request $request)
    {

        return $this->render('emplacement/stockage.html.twig');

    }

    /**
     * @Route("/addpackage", name="detailvoyage_add_package")
     * @Method({"POST"})
     */
 /*   public function trouveEmplacements(Request $request)
    {
        if ($request->isMethod('POST') && $request->isXmlHttpRequest())
        {
            
        }

    }


    /**
     * Add Package on detailVoyage entity.
     *
     * @Route("/addpackage", name="detailvoyage_add_package")
     * @Method({"POST"})
     */

    /*
    public function addPackageAction(Request $request)
    {

        if ($request->isMethod('POST') && $request->isXmlHttpRequest())
        {

            $content = $request->request;
            $em = $this->getDoctrine()->getManager();
            $retour = $em->getRepository('AppBundle:GestionRetour')->find($content->get('id'));
            $voyage = $em->getRepository('AppBundle:Voyage')->find($content->get('voyage'));
            $login = $em->getRepository('AppBundle:User')->find($this->getUser()->getId());

            $detailVoyage = new Detailvoyage();
            $detailVoyage->setRetour($retour);
            $detailVoyage->setLogin($login);
            $detailVoyage->setVoyage($voyage);
            $em->persist($detailVoyage);

            $retour->setVoyage(true);
            $em->flush();

            $data = $detailVoyage->getId();

            return new JsonResponse($data);
        }
        return false;
    }

*/



}
