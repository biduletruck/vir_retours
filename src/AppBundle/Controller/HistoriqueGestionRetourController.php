<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistoriqueGestionRetour;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Historiquegestionretour controller.
 *
 * @Route("historique")
 */
class HistoriqueGestionRetourController extends Controller
{
    /**
     * Lists all historiqueGestionRetour entities.
     *
     * @Route("/", name="historique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historiqueGestionRetours = $em->getRepository('AppBundle:HistoriqueGestionRetour')->findAll();


        return $this->render('historiquegestionretour/index.html.twig', array(
            'historiqueGestionRetours' => $historiqueGestionRetours,
        ));
    }

    /**
     * Creates a new historiqueGestionRetour entity.
     *
     * @Route("/new", name="historique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $historiqueGestionRetour = new Historiquegestionretour();
        $form = $this->createForm('AppBundle\Form\HistoriqueGestionRetourType', $historiqueGestionRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historiqueGestionRetour);
            $em->flush();

            return $this->redirectToRoute('historique_show', array('id' => $historiqueGestionRetour->getId()));
        }

        return $this->render('historiquegestionretour/new.html.twig', array(
            'historiqueGestionRetour' => $historiqueGestionRetour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a historiqueGestionRetour entity.
     *
     * @Route("/{id}", name="historique_show")
     * @Method("GET")
     */
    public function showAction(HistoriqueGestionRetour $historiqueGestionRetour)
    {
        $deleteForm = $this->createDeleteForm($historiqueGestionRetour);

        return $this->render('historiquegestionretour/show.html.twig', array(
            'historiqueGestionRetour' => $historiqueGestionRetour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing historiqueGestionRetour entity.
     *
     * @Route("/{id}/edit", name="historique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HistoriqueGestionRetour $historiqueGestionRetour)
    {
        $deleteForm = $this->createDeleteForm($historiqueGestionRetour);
        $editForm = $this->createForm('AppBundle\Form\HistoriqueGestionRetourType', $historiqueGestionRetour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('historique_edit', array('id' => $historiqueGestionRetour->getId()));
        }

        return $this->render('historiquegestionretour/edit.html.twig', array(
            'historiqueGestionRetour' => $historiqueGestionRetour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a historiqueGestionRetour entity.
     *
     * @Route("/{id}", name="historique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HistoriqueGestionRetour $historiqueGestionRetour)
    {
        $form = $this->createDeleteForm($historiqueGestionRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historiqueGestionRetour);
            $em->flush();
        }

        return $this->redirectToRoute('historique_index');
    }

    /**
     * Creates a form to delete a historiqueGestionRetour entity.
     *
     * @param HistoriqueGestionRetour $historiqueGestionRetour The historiqueGestionRetour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HistoriqueGestionRetour $historiqueGestionRetour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historique_delete', array('id' => $historiqueGestionRetour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
