<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coli;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Coli controller.
 *
 * @Route("coli")
 */
class ColiController extends Controller
{
    /**
     * Lists all coli entities.
     *
     * @Route("/", name="coli_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $colis = $em->getRepository('AppBundle:Coli')->findAll();

        return $this->render('coli/index.html.twig', array(
            'colis' => $colis,
        ));
    }

    /**
     * Creates a new coli entity.
     *
     * @Route("/new", name="coli_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $coli = new Coli();
        $form = $this->createForm('AppBundle\Form\ColiType', $coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coli);
            $em->flush();

            return $this->redirectToRoute('coli_show', array('id' => $coli->getId()));
        }

        return $this->render('coli/new.html.twig', array(
            'coli' => $coli,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coli entity.
     *
     * @Route("/{id}", name="coli_show")
     * @Method("GET")
     */
    public function showAction(Coli $coli)
    {
        $deleteForm = $this->createDeleteForm($coli);

        return $this->render('coli/show.html.twig', array(
            'coli' => $coli,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coli entity.
     *
     * @Route("/{id}/edit", name="coli_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Coli $coli)
    {
        $deleteForm = $this->createDeleteForm($coli);
        $editForm = $this->createForm('AppBundle\Form\ColiType', $coli);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coli_edit', array('id' => $coli->getId()));
        }

        return $this->render('coli/edit.html.twig', array(
            'coli' => $coli,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coli entity.
     *
     * @Route("/{id}", name="coli_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Coli $coli)
    {
        $form = $this->createDeleteForm($coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coli);
            $em->flush();
        }

        return $this->redirectToRoute('coli_index');
    }

    /**
     * Creates a form to delete a coli entity.
     *
     * @param Coli $coli The coli entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Coli $coli)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('coli_delete', array('id' => $coli->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
