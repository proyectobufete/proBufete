<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Tipoasuntos;
use BufeteBundle\Form\TipoasuntosType;

/**
 * Tipoasuntos controller.
 *
 */
class TipoasuntosController extends Controller
{
    /**
     * Lists all Tipoasuntos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoasuntos = $em->getRepository('BufeteBundle:Tipoasuntos')->findAll();

        return $this->render('tipoasuntos/index.html.twig', array(
            'tipoasuntos' => $tipoasuntos,
        ));
    }

    /**
     * Creates a new Tipoasuntos entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipoasunto = new Tipoasuntos();
        $form = $this->createForm('BufeteBundle\Form\TipoasuntosType', $tipoasunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoasunto);
            $em->flush();

            return $this->redirectToRoute('tipoasuntos_show', array('id' => $tipoasunto->getIdTipoasunto()));
        }

        return $this->render('tipoasuntos/new.html.twig', array(
            'tipoasunto' => $tipoasunto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tipoasuntos entity.
     *
     */
    public function showAction(Tipoasuntos $tipoasunto)
    {
        $deleteForm = $this->createDeleteForm($tipoasunto);

        return $this->render('tipoasuntos/show.html.twig', array(
            'tipoasunto' => $tipoasunto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tipoasuntos entity.
     *
     */
    public function editAction(Request $request, Tipoasuntos $tipoasunto)
    {
        $deleteForm = $this->createDeleteForm($tipoasunto);
        $editForm = $this->createForm('BufeteBundle\Form\TipoasuntosType', $tipoasunto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoasunto);
            $em->flush();

            return $this->redirectToRoute('tipoasuntos_edit', array('id' => $tipoasunto->getIdTipoasunto()));
        }

        return $this->render('tipoasuntos/edit.html.twig', array(
            'tipoasunto' => $tipoasunto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tipoasuntos entity.
     *
     */
    public function deleteAction(Request $request, Tipoasuntos $tipoasunto)
    {
        $form = $this->createDeleteForm($tipoasunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoasunto);
            $em->flush();
        }

        return $this->redirectToRoute('tipoasuntos_index');
    }

    /**
     * Creates a form to delete a Tipoasuntos entity.
     *
     * @param Tipoasuntos $tipoasunto The Tipoasuntos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tipoasuntos $tipoasunto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoasuntos_delete', array('id' => $tipoasunto->getIdTipoasunto())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
