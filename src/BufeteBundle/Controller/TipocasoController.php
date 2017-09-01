<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Tipocaso;
use BufeteBundle\Form\TipocasoType;

/**
 * Tipocaso controller.
 *
 */
class TipocasoController extends Controller
{
    /**
     * Lists all Tipocaso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipocasos = $em->getRepository('BufeteBundle:Tipocaso')->findAll();

        return $this->render('tipocaso/index.html.twig', array(
            'tipocasos' => $tipocasos,
        ));
    }

    /**
     * Creates a new Tipocaso entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipocaso = new Tipocaso();
        $form = $this->createForm('BufeteBundle\Form\TipocasoType', $tipocaso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipocaso);
            $em->flush();

            return $this->redirectToRoute('tipocaso_show', array('id' => $tipocaso->getIdTipo()));
        }

        return $this->render('tipocaso/new.html.twig', array(
            'tipocaso' => $tipocaso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tipocaso entity.
     *
     */
    public function showAction(Tipocaso $tipocaso)
    {
        $deleteForm = $this->createDeleteForm($tipocaso);

        return $this->render('tipocaso/show.html.twig', array(
            'tipocaso' => $tipocaso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tipocaso entity.
     *
     */
    public function editAction(Request $request, Tipocaso $tipocaso)
    {
        $deleteForm = $this->createDeleteForm($tipocaso);
        $editForm = $this->createForm('BufeteBundle\Form\TipocasoType', $tipocaso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipocaso);
            $em->flush();

            return $this->redirectToRoute('tipocaso_edit', array('id' => $tipocaso->getIdTipo()));
        }

        return $this->render('tipocaso/edit.html.twig', array(
            'tipocaso' => $tipocaso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tipocaso entity.
     *
     */
    public function deleteAction(Request $request, Tipocaso $tipocaso)
    {
        $form = $this->createDeleteForm($tipocaso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipocaso);
            $em->flush();
        }

        return $this->redirectToRoute('tipocaso_index');
    }

    /**
     * Creates a form to delete a Tipocaso entity.
     *
     * @param Tipocaso $tipocaso The Tipocaso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tipocaso $tipocaso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocaso_delete', array('id' => $tipocaso->getIdTipo())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
