<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Prestation controller.
 *
 * @Route("admin/gestion/prestation")
 */
class PrestationController extends Controller
{
    /**
     * Lists all prestation entities.
     *
     * @Route("/", name="admin_gestion_prestation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $prestations = $em->getRepository('AppBundle:Prestation')->findAll();

        return $this->render('prestation/index.html.twig', array(
            'prestations' => $prestations,
        ));
    }

    /**
     * Creates a new prestation entity.
     *
     * @Route("/new", name="admin_gestion_prestation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $prestation = new Prestation();
        $form = $this->createForm('AppBundle\Form\PrestationType', $prestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestation);
            $em->flush();

            return $this->redirectToRoute('admin_gestion_prestation_show', array('id' => $prestation->getId()));
        }

        return $this->render('prestation/new.html.twig', array(
            'prestation' => $prestation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a prestation entity.
     *
     * @Route("/{id}", name="admin_gestion_prestation_show")
     * @Method("GET")
     */
    public function showAction(Prestation $prestation)
    {
        $deleteForm = $this->createDeleteForm($prestation);

        return $this->render('prestation/show.html.twig', array(
            'prestation' => $prestation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing prestation entity.
     *
     * @Route("/{id}/edit", name="admin_gestion_prestation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Prestation $prestation)
    {
        $deleteForm = $this->createDeleteForm($prestation);
        $editForm = $this->createForm('AppBundle\Form\PrestationType', $prestation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_gestion_prestation_edit', array('id' => $prestation->getId()));
        }

        return $this->render('prestation/edit.html.twig', array(
            'prestation' => $prestation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a prestation entity.
     *
     * @Route("/{id}", name="admin_gestion_prestation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prestation $prestation)
    {
        $form = $this->createDeleteForm($prestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prestation);
            $em->flush();
        }

        return $this->redirectToRoute('admin_gestion_prestation_index');
    }

    /**
     * Creates a form to delete a prestation entity.
     *
     * @param Prestation $prestation The prestation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prestation $prestation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_gestion_prestation_delete', array('id' => $prestation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
