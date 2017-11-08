<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MotifRetour;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Motifretour controller.
 *
 * @Route("admin/gestion/motifretour")
 */
class MotifRetourController extends Controller
{
    /**
     * Lists all motifRetour entities.
     *
     * @Route("/", name="admin_gestion_motifretour_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $motifRetours = $em->getRepository('AppBundle:MotifRetour')->findAll();

        return $this->render('motifretour/index.html.twig', array(
            'motifRetours' => $motifRetours,
        ));
    }

    /**
     * Creates a new motifRetour entity.
     *
     * @Route("/new", name="admin_gestion_motifretour_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $motifRetour = new Motifretour();
        $form = $this->createForm('AppBundle\Form\MotifRetourType', $motifRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motifRetour);
            $em->flush();

            return $this->redirectToRoute('admin_gestion_motifretour_show', array('id' => $motifRetour->getId()));
        }

        return $this->render('motifretour/new.html.twig', array(
            'motifRetour' => $motifRetour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a motifRetour entity.
     *
     * @Route("/{id}", name="admin_gestion_motifretour_show")
     * @Method("GET")
     */
    public function showAction(MotifRetour $motifRetour)
    {
        $deleteForm = $this->createDeleteForm($motifRetour);

        return $this->render('motifretour/show.html.twig', array(
            'motifRetour' => $motifRetour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing motifRetour entity.
     *
     * @Route("/{id}/edit", name="admin_gestion_motifretour_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MotifRetour $motifRetour)
    {
        $deleteForm = $this->createDeleteForm($motifRetour);
        $editForm = $this->createForm('AppBundle\Form\MotifRetourType', $motifRetour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_gestion_motifretour_edit', array('id' => $motifRetour->getId()));
        }

        return $this->render('motifretour/edit.html.twig', array(
            'motifRetour' => $motifRetour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a motifRetour entity.
     *
     * @Route("/{id}", name="admin_gestion_motifretour_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MotifRetour $motifRetour)
    {
        $form = $this->createDeleteForm($motifRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($motifRetour);
            $em->flush();
        }

        return $this->redirectToRoute('admin_gestion_motifretour_index');
    }

    /**
     * Creates a form to delete a motifRetour entity.
     *
     * @param MotifRetour $motifRetour The motifRetour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MotifRetour $motifRetour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_gestion_motifretour_delete', array('id' => $motifRetour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
