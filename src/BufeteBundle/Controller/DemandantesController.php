<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Demandantes;
use BufeteBundle\Form\DemandantesType;

/**
 * Demandantes controller.
 *
 */
class DemandantesController extends Controller
{
    /**
     * Lists all Demandantes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandantes = $em->getRepository('BufeteBundle:Demandantes')->findAll();

        return $this->render('demandantes/index.html.twig', array(
            'demandantes' => $demandantes,
        ));
    }

    /**
     * Creates a new Demandantes entity.
     *
     */
    public function newAction(Request $request)
    {
        $demandante = new Demandantes();
        $form = $this->createForm('BufeteBundle\Form\DemandantesType', $demandante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandante);
            $em->flush();
            $status ="Formulario Valido";

          //  return $this->redirectToRoute('demandantes_show', array('id' => $demandante->getIdDemandante()));
        }else{
            $status = null;
        }

        return $this->render('demandantes/new.html.twig', array(
            'demandante' => $demandante,
            'form' => $form->createView(),
            'status' => $status
        ));
    }

    /**
     * Finds and displays a Demandantes entity.
     *
     */
    public function showAction(Demandantes $demandante)
    {
        $deleteForm = $this->createDeleteForm($demandante);

        return $this->render('demandantes/show.html.twig', array(
            'demandante' => $demandante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Demandantes entity.
     *
     */
    public function editAction(Request $request, Demandantes $demandante)
    {
        $deleteForm = $this->createDeleteForm($demandante);
        $editForm = $this->createForm('BufeteBundle\Form\DemandantesType', $demandante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandante);
            $em->flush();

            return $this->redirectToRoute('demandantes_edit', array('id' => $demandante->getIdDemandante()));
        }

        return $this->render('demandantes/edit.html.twig', array(
            'demandante' => $demandante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Demandantes entity.
     *
     */
    public function deleteAction(Request $request, Demandantes $demandante)
    {
        $form = $this->createDeleteForm($demandante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandante);
            $em->flush();
        }

        return $this->redirectToRoute('demandantes_index');
    }

    /**
     * Creates a form to delete a Demandantes entity.
     *
     * @param Demandantes $demandante The Demandantes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demandantes $demandante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandantes_delete', array('id' => $demandante->getIdDemandante())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
