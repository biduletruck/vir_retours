<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GestionRetour;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Gestionretour controller.
 *
 * @Route("retours")
 */
class GestionRetourController extends Controller
{
    /**
     * Lists all gestionRetour entities.
     *
     * @Route("/", name="retours_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gestionRetours = $em->getRepository('AppBundle:GestionRetour')->findAll();

        return $this->render('gestionretour/index.html.twig', array(
            'gestionRetours' => $gestionRetours,
        ));
    }

    /**
     * Creates a new gestionRetour entity.
     *
     * @Route("/new", name="retours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gestionRetour = new Gestionretour();
        $form = $this->createForm('AppBundle\Form\GestionRetourType', $gestionRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gestionRetour);
            $em->flush();

            return $this->redirectToRoute('retours_show', array('id' => $gestionRetour->getId()));
        }

        return $this->render('gestionretour/new.html.twig', array(
            'gestionRetour' => $gestionRetour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gestionRetour entity.
     *
     * @Route("/{id}", name="retours_show")
     * @Method("GET")
     */
    public function showAction(GestionRetour $gestionRetour)
    {
        $deleteForm = $this->createDeleteForm($gestionRetour);

        return $this->render('gestionretour/show.html.twig', array(
            'gestionRetour' => $gestionRetour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gestionRetour entity.
     *
     * @Route("/{id}/edit", name="retours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GestionRetour $gestionRetour)
    {
        $deleteForm = $this->createDeleteForm($gestionRetour);
        $editForm = $this->createForm('AppBundle\Form\GestionRetourType', $gestionRetour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('retours_edit', array('id' => $gestionRetour->getId()));
        }

        return $this->render('gestionretour/edit.html.twig', array(
            'gestionRetour' => $gestionRetour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gestionRetour entity.
     *
     * @Route("/{id}", name="retours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GestionRetour $gestionRetour)
    {
        $form = $this->createDeleteForm($gestionRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gestionRetour);
            $em->flush();
        }

        return $this->redirectToRoute('retours_index');
    }

    /**
     * Creates a form to delete a gestionRetour entity.
     *
     * @param GestionRetour $gestionRetour The gestionRetour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GestionRetour $gestionRetour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('retours_delete', array('id' => $gestionRetour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
