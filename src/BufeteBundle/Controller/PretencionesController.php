<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Pretenciones;
use BufeteBundle\Form\PretencionesType;

/**
 * Pretenciones controller.
 *
 */
class PretencionesController extends Controller
{
    /**
     * Lists all Pretenciones entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pretenciones = $em->getRepository('BufeteBundle:Pretenciones')->findAll();

        return $this->render('pretenciones/index.html.twig', array(
            'pretenciones' => $pretenciones,
        ));
    }

    /**
     * Creates a new Pretenciones entity.
     *
     */
    public function newAction(Request $request)
    {
        $pretencione = new Pretenciones();
        $form = $this->createForm('BufeteBundle\Form\PretencionesType', $pretencione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pretencione);
            $em->flush();

            return $this->redirectToRoute('pretenciones_show', array('id' => $pretencione->getIdPretencion()));
        }

        return $this->render('pretenciones/new.html.twig', array(
            'pretencione' => $pretencione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pretenciones entity.
     *
     */
    public function showAction(Pretenciones $pretencione)
    {
        $deleteForm = $this->createDeleteForm($pretencione);

        return $this->render('pretenciones/show.html.twig', array(
            'pretencione' => $pretencione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pretenciones entity.
     *
     */
    public function editAction(Request $request, Pretenciones $pretencione)
    {
        $deleteForm = $this->createDeleteForm($pretencione);
        $editForm = $this->createForm('BufeteBundle\Form\PretencionesType', $pretencione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pretencione);
            $em->flush();

            return $this->redirectToRoute('pretenciones_edit', array('id' => $pretencione->getIdPretencion()));
        }

        return $this->render('pretenciones/edit.html.twig', array(
            'pretencione' => $pretencione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pretenciones entity.
     *
     */
    public function deleteAction(Request $request, Pretenciones $pretencione)
    {
        $form = $this->createDeleteForm($pretencione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pretencione);
            $em->flush();
        }

        return $this->redirectToRoute('pretenciones_index');
    }

    /**
     * Creates a form to delete a Pretenciones entity.
     *
     * @param Pretenciones $pretencione The Pretenciones entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pretenciones $pretencione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pretenciones_delete', array('id' => $pretencione->getIdPretencion())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
