<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Emplacement;
use AppBundle\Entity\GestionRetour;
use function dump;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * Rechercher un colis à stocker.
     *
     * @Route("/stockage", name="emplacement_stockage")
     */
    public function stockageAction(Request $request)
    {

        return $this->render('emplacement/stockage.html.twig');

    }

    /**
     * Rechercher un colis à stocker.
     *
     * @Route("/find_stock", name="find_stock")
     */
    public function findOneAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\GestionRetour\FindOneGestionRetourType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /* @var $result GestionRetour */
            $results = $em->getRepository('AppBundle:GestionRetour')->stockageEnAttente($form->getData()->getNumeroSage(),$this->getUser()->getAgence());

            $truc =[];
            foreach ($results as $result)
            {
                foreach ( $result->getEmplacement() as $pace)
                {
                    $form2 = $this->createForm('AppBundle\Form\Emplacement\AddNewRetourType',$pace);
                    $truc[] = $form2->createView();
                }

                return $this->render('gestionretour/stockage.html.twig', array(
                    'form' => $form->getData(),
                    'result' => $truc,
                    'results' => $results[0],
                ));
            }
        }

    return $this->render('gestionretour/stockage.html.twig', array(
        'form' => $form->createView(),
        ));
    }

    /**
    * Add Package on detailVoyage entity.
    *
    * @Route("/stock_rack", name="add_in_rack")
    */
    public function addPackageInRackAction(Request $request)
    {

        if ($request->isMethod('POST') && $request->isXmlHttpRequest())
        {
            $content = $request->request;
            $em = $this->getDoctrine()->getManager();
            /* @var $emplacement Emplacement  */
            $emplacement = $em->getRepository('AppBundle:Emplacement')->find($content->get('id'));
            $emplacement->setDateStockage(new \DateTime());
            $emplacement->setLogin($em->getRepository('AppBundle:User')->find($this->getUser()->getId()));
            $emplacement->setNumeroEmplacement($content->get('emplacement'));
            $em->flush();
            return new JsonResponse();
        }
        return false;
    }

    /**
     * Add Package on detailVoyage entity.
     *
     * @Route("/siRetourExiste", name="siRetourExist")
     */
    public function siRetourExisteAction(Request $request)
    {

        if ($request->isMethod('POST') && $request->isXmlHttpRequest())
        {
            $content = $request->request;
            $em = $this->getDoctrine()->getManager();
            /* @var $emplacement Emplacement  */
            $retourExiste = $em->getRepository('AppBundle:GestionRetour')->siRetourExiste($content->get('retour'));

            return new JsonResponse($retourExiste);
        }
        return false;
    }




}
