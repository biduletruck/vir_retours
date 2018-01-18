<?php

namespace AppBundle\Controller;

use A;
use AppBundle\Entity\DetailVoyage;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Voyage;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use const true;

/**
 * Voyage controller.
 *
 * @Route("voyage")
 */
class VoyageController extends Controller
{
    /**
     * Lists all voyage entities.
     *
     * @Route("/", name="voyage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $voyages = $em->getRepository('AppBundle:Voyage')->findAll();

        return $this->render('voyage/index.html.twig', array(
            'voyages' => $voyages,
        ));
    }

    /**
     * Creates a new voyage entity.
     *
     * @Route("/new", name="voyage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $voyage = new Voyage();
        $form = $this->createForm('AppBundle\Form\Voyage\VoyageType', $voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            return $this->redirectToRoute('voyage_show', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/new.html.twig', array(
            'voyage' => $voyage,
            'form' => $form->createView(),
        ));
    }

    /**
 * Finds and displays a voyage entity.
 *
 * @Route("/{id}", name="voyage_show")
 * @Method("GET")
 */
    public function showAction(Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);

        $em = $this->getDoctrine()->getManager();

        $packageInTravel = $em->getRepository('AppBundle:DetailVoyage')
            ->findPackageInTravel($voyage->getId());

        return $this->render('voyage/show.html.twig', array(
            'voyage' => $voyage,
            'listing_retour' => $packageInTravel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a voyage entity.
     *
     * @Route("/{id}/create", name="voyage_create_retour")
     * @Method("GET")
     */
    public function createRetourAction(Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);

        $em = $this->getDoctrine()->getManager();

        $packageInTravel = $em->getRepository('AppBundle:DetailVoyage')
            ->findPackageInTravel($voyage->getId());


        $stockForTravel = $em->getRepository('AppBundle:GestionRetour')
            ->findStockForTravel($voyage->getRattachement()->getNom(), $voyage->getAgence()->getId() );



        return $this->render('voyage/create_retour.html.twig', array(
            'voyage' => $voyage,
            'disponibilites' => $stockForTravel,
            'listing_retour' => $packageInTravel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing voyage entity.
     *
     * @Route("/{id}/edit", name="voyage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);
        $editForm = $this->createForm('AppBundle\Form\Voyage\VoyageType', $voyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voyage_edit', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/edit.html.twig', array(
            'voyage' => $voyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a voyage entity.
     *
     * @Route("/{id}", name="voyage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Voyage $voyage)
    {
        $form = $this->createDeleteForm($voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $packageInTravel = $em->getRepository('AppBundle:DetailVoyage')
                ->findPackageInTravel($voyage->getId());
            /* @var $package DetailVoyage */
            foreach ($packageInTravel as $package)
            {
                $em->getRepository('AppBundle:DetailVoyage')->deleteTravel($voyage->getId());
                $package->getRetour()->setVoyage(false);
            }

            $em->remove($voyage);
            $em->flush();
        }

        return $this->redirectToRoute('voyage_index');
    }

    /**
     * Creates a form to delete a voyage entity.
     *
     * @param Voyage $voyage The voyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voyage $voyage)
    {

        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $voyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * Export du voyage au format Excel
     *
     * @Route("/{id}/xls", name="voyage_export_xls_package")
     * @Method({"GET", "POST"})
     */
    public function exportExcelVoyageAction(Voyage $voyage)
    {
        list($excel, $classeur, $titre) = $this->formatingExtract($voyage);
        return $excel->exportExcel($classeur, $titre);
    }

    /**
     * Export du voyage au format Pdf
     *
     * @Route("/{id}/pdf", name="voyage_export_pdf_package")
     * @Method({"GET", "POST"})
     */
    public function exportPdfVoyageAction(Voyage $voyage)
    {
        list($excel, $classeur, $titre) = $this->formatingExtract($voyage);
        return $excel->exportPdf($classeur, $titre);
    }

    /**
     * @param Voyage $voyage
     * @return array
     */
    private function formatingExtract(Voyage $voyage)
    {
        $em = $this->getDoctrine()->getManager();

        $packageInTravel = $em->getRepository('AppBundle:DetailVoyage')
            ->findPackageInTravel($voyage->getId());

        $excel = $this->container->get('app.excel_service');
        $classeur = $excel->newExcelFromModel();
        $feuille = $classeur->getActiveSheet();
        $titre = $voyage->getNomVoyage();


        //Type de retour + rattachement
        $feuille->SetCellValue('C2', "Liste des retours vers " .  $voyage->getRattachement()->getNom());
        $feuille->SetCellValue('G6', $titre);
        $feuille->SetCellValue('D6', Date::PHPToExcel($voyage->getDateRetour()));
        $feuille->getStyle('D6')
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);

        $rowCount = 10; //ligne de départ

        // Remlissage des cellules avec les valeurs
        foreach ($packageInTravel as $row)
        {
            $range = 'B' . $rowCount . ':H' . $rowCount;
            $values = $row->getRetour()->getEmplacement();
            $emplacements = [];
            foreach ($values as $value)
            {
                $emplacements[] = $value->getNumeroEmplacement();
            }
            $feuille->SetCellValue('b' . $rowCount, $row->getRetour()->getMagasin()->getNomMagasin());
            $feuille->SetCellValue('c' . $rowCount, $row->getRetour()->getNumeroSage());
            $feuille->SetCellValue('d' . $rowCount, $row->getRetour()->getNomDestinataire());
            $feuille->SetCellValue('e' . $rowCount, $row->getRetour()->getNombreColis());
            $feuille->SetCellValue('f' . $rowCount, $row->getRetour()->getNombreSupport());
            $feuille->SetCellValue('g' . $rowCount, $this->container->get('app.emplacement_service')->transformArrayRack($emplacements));
            $feuille->SetCellValue('h' . $rowCount, $row->getRetour()->getMotifRetour()->getNomMotifRetour());
            $feuille->getStyle($range)->applyFromArray($excel->alernateStyle($rowCount));
            $rowCount++;
        }

        //insert des signatures
        $rowCount += 5;

        $feuille->setCellValue('a' . $rowCount, "Signature Agence : " . $voyage->getAgence()->getNomAgence()
             //   ->setCellValue('')
        );
        $feuille->getStyle('a' . $rowCount)->getFont()->setSize(14);

        return array($excel, $classeur, $titre);
    }
}
