<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Emplacement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Emplacement controller.
 *
 * @Route("emplacement")
 */
class EmplacementController extends Controller
{
    /**
     * Lists all emplacement entities.
     *
     * @Route("/", name="emplacement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emplacements = $em->getRepository('AppBundle:Emplacement')->findAll();

        return $this->render('emplacement/index.html.twig', array(
            'emplacements' => $emplacements,
        ));
    }

    /**
     * Creates a new emplacement entity.
     *
     * @Route("/new", name="emplacement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $emplacement = new Emplacement();
        $form = $this->createForm('AppBundle\Form\EmplacementType', $emplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emplacement);
            $em->flush();

            return $this->redirectToRoute('emplacement_show', array('id' => $emplacement->getId()));
        }

        return $this->render('emplacement/new.html.twig', array(
            'emplacement' => $emplacement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a emplacement entity.
     *
     * @Route("/{id}", name="emplacement_show")
     * @Method("GET")
     */
    public function showAction(Emplacement $emplacement)
    {
        $deleteForm = $this->createDeleteForm($emplacement);

        return $this->render('emplacement/show.html.twig', array(
            'emplacement' => $emplacement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing emplacement entity.
     *
     * @Route("/{id}/edit", name="emplacement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Emplacement $emplacement)
    {
        $deleteForm = $this->createDeleteForm($emplacement);
        $editForm = $this->createForm('AppBundle\Form\EmplacementType', $emplacement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('emplacement_edit', array('id' => $emplacement->getId()));
        }

        return $this->render('emplacement/edit.html.twig', array(
            'emplacement' => $emplacement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a emplacement entity.
     *
     * @Route("/{id}", name="emplacement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Emplacement $emplacement)
    {
        $form = $this->createDeleteForm($emplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emplacement);
            $em->flush();
        }

        return $this->redirectToRoute('emplacement_index');
    }

    /**
     * Creates a form to delete a emplacement entity.
     *
     * @param Emplacement $emplacement The emplacement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Emplacement $emplacement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emplacement_delete', array('id' => $emplacement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
