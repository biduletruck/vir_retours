<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DonneurOrdre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Donneurordre controller.
 *
 * @Route("admin/gestion/donneurordre")
 */
class DonneurOrdreController extends Controller
{
    /**
     * Lists all donneurOrdre entities.
     *
     * @Route("/", name="admin_gestion_donneurordre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $donneurOrdres = $em->getRepository('AppBundle:DonneurOrdre')->findAll();

        return $this->render('donneurordre/index.html.twig', array(
            'donneurOrdres' => $donneurOrdres,
        ));
    }

    /**
     * Creates a new donneurOrdre entity.
     *
     * @Route("/new", name="admin_gestion_donneurordre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $donneurOrdre = new Donneurordre();
        $form = $this->createForm('AppBundle\Form\DonneurOrdreType', $donneurOrdre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($donneurOrdre);
            $em->flush();

            return $this->redirectToRoute('admin_gestion_donneurordre_show', array('id' => $donneurOrdre->getId()));
        }

        return $this->render('donneurordre/new.html.twig', array(
            'donneurOrdre' => $donneurOrdre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a donneurOrdre entity.
     *
     * @Route("/{id}", name="admin_gestion_donneurordre_show")
     * @Method("GET")
     */
    public function showAction(DonneurOrdre $donneurOrdre)
    {
        $deleteForm = $this->createDeleteForm($donneurOrdre);

        return $this->render('donneurordre/show.html.twig', array(
            'donneurOrdre' => $donneurOrdre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing donneurOrdre entity.
     *
     * @Route("/{id}/edit", name="admin_gestion_donneurordre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DonneurOrdre $donneurOrdre)
    {
        $deleteForm = $this->createDeleteForm($donneurOrdre);
        $editForm = $this->createForm('AppBundle\Form\DonneurOrdreType', $donneurOrdre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_gestion_donneurordre_edit', array('id' => $donneurOrdre->getId()));
        }

        return $this->render('donneurordre/edit.html.twig', array(
            'donneurOrdre' => $donneurOrdre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a donneurOrdre entity.
     *
     * @Route("/{id}", name="admin_gestion_donneurordre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DonneurOrdre $donneurOrdre)
    {
        $form = $this->createDeleteForm($donneurOrdre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($donneurOrdre);
            $em->flush();
        }

        return $this->redirectToRoute('admin_gestion_donneurordre_index');
    }

    /**
     * Creates a form to delete a donneurOrdre entity.
     *
     * @param DonneurOrdre $donneurOrdre The donneurOrdre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DonneurOrdre $donneurOrdre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_gestion_donneurordre_delete', array('id' => $donneurOrdre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
