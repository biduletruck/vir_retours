<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetailVoyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Detailvoyage controller.
 *
 * @Route("detailvoyage")
 */
class DetailVoyageController extends Controller
{
    /**
     * Lists all detailVoyage entities.
     *
     * @Route("/", name="detailvoyage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detailVoyages = $em->getRepository('AppBundle:DetailVoyage')->findAll();

        return $this->render('detailvoyage/index.html.twig', array(
            'detailVoyages' => $detailVoyages,
        ));
    }

    /**
     * Creates a new detailVoyage entity.
     *
     * @Route("/new", name="detailvoyage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detailVoyage = new Detailvoyage();
        $form = $this->createForm('AppBundle\Form\DetailVoyageType', $detailVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailVoyage);
            $em->flush();

            return $this->redirectToRoute('detailvoyage_show', array('id' => $detailVoyage->getId()));
        }

        return $this->render('detailvoyage/new.html.twig', array(
            'detailVoyage' => $detailVoyage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detailVoyage entity.
     *
     * @Route("/{id}", name="detailvoyage_show")
     * @Method("GET")
     */
    public function showAction(DetailVoyage $detailVoyage)
    {
        $deleteForm = $this->createDeleteForm($detailVoyage);

        return $this->render('detailvoyage/show.html.twig', array(
            'detailVoyage' => $detailVoyage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detailVoyage entity.
     *
     * @Route("/{id}/edit", name="detailvoyage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetailVoyage $detailVoyage)
    {
        $deleteForm = $this->createDeleteForm($detailVoyage);
        $editForm = $this->createForm('AppBundle\Form\DetailVoyageType', $detailVoyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detailvoyage_edit', array('id' => $detailVoyage->getId()));
        }

        return $this->render('detailvoyage/edit.html.twig', array(
            'detailVoyage' => $detailVoyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detailVoyage entity.
     *
     * @Route("/{id}", name="detailvoyage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetailVoyage $detailVoyage)
    {
        $form = $this->createDeleteForm($detailVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailVoyage);
            $em->flush();
        }

        return $this->redirectToRoute('detailvoyage_index');
    }

    /**
     * Creates a form to delete a detailVoyage entity.
     *
     * @param DetailVoyage $detailVoyage The detailVoyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetailVoyage $detailVoyage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detailvoyage_delete', array('id' => $detailVoyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
