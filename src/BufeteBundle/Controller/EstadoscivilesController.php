<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Estadosciviles;
use BufeteBundle\Form\EstadoscivilesType;

/**
 * Estadosciviles controller.
 *
 */
class EstadoscivilesController extends Controller
{
    /**
     * Lists all Estadosciviles entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estadosciviles = $em->getRepository('BufeteBundle:Estadosciviles')->findAll();

        return $this->render('estadosciviles/index.html.twig', array(
            'estadosciviles' => $estadosciviles,
        ));
    }

    /**
     * Creates a new Estadosciviles entity.
     *
     */
    public function newAction(Request $request)
    {
        $estadoscivile = new Estadosciviles();
        $form = $this->createForm('BufeteBundle\Form\EstadoscivilesType', $estadoscivile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estadoscivile);
            $em->flush();

            return $this->redirectToRoute('estadosciviles_show', array('id' => $estadoscivile->getIdEstadocivil()));
        }

        return $this->render('estadosciviles/new.html.twig', array(
            'estadoscivile' => $estadoscivile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Estadosciviles entity.
     *
     */
    public function showAction(Estadosciviles $estadoscivile)
    {
        $deleteForm = $this->createDeleteForm($estadoscivile);

        return $this->render('estadosciviles/show.html.twig', array(
            'estadoscivile' => $estadoscivile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Estadosciviles entity.
     *
     */
    public function editAction(Request $request, Estadosciviles $estadoscivile)
    {
        $deleteForm = $this->createDeleteForm($estadoscivile);
        $editForm = $this->createForm('BufeteBundle\Form\EstadoscivilesType', $estadoscivile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estadoscivile);
            $em->flush();

            return $this->redirectToRoute('estadosciviles_edit', array('id' => $estadoscivile->getIdEstadocivil()));
        }

        return $this->render('estadosciviles/edit.html.twig', array(
            'estadoscivile' => $estadoscivile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Estadosciviles entity.
     *
     */
    public function deleteAction(Request $request, Estadosciviles $estadoscivile)
    {
        $form = $this->createDeleteForm($estadoscivile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estadoscivile);
            $em->flush();
        }

        return $this->redirectToRoute('estadosciviles_index');
    }

    /**
     * Creates a form to delete a Estadosciviles entity.
     *
     * @param Estadosciviles $estadoscivile The Estadosciviles entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estadosciviles $estadoscivile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadosciviles_delete', array('id' => $estadoscivile->getIdEstadocivil())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
