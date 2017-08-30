<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Prestaciones;
use BufeteBundle\Form\PrestacionesType;

/**
 * Prestaciones controller.
 *
 */
class PrestacionesController extends Controller
{
    /**
     * Lists all Prestaciones entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $prestaciones = $em->getRepository('BufeteBundle:Prestaciones')->findAll();

        return $this->render('prestaciones/index.html.twig', array(
            'prestaciones' => $prestaciones,
        ));
    }

    /**
     * Creates a new Prestaciones entity.
     *
     */
    public function newAction(Request $request)
    {
        $prestacione = new Prestaciones();
        $form = $this->createForm('BufeteBundle\Form\PrestacionesType', $prestacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestacione);
            $em->flush();

            return $this->redirectToRoute('prestaciones_show', array('id' => $prestacione->getIdPrestaciones()));
        }

        return $this->render('prestaciones/new.html.twig', array(
            'prestacione' => $prestacione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Prestaciones entity.
     *
     */
    public function showAction(Prestaciones $prestacione)
    {
        $deleteForm = $this->createDeleteForm($prestacione);

        return $this->render('prestaciones/show.html.twig', array(
            'prestacione' => $prestacione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Prestaciones entity.
     *
     */
    public function editAction(Request $request, Prestaciones $prestacione)
    {
        $deleteForm = $this->createDeleteForm($prestacione);
        $editForm = $this->createForm('BufeteBundle\Form\PrestacionesType', $prestacione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestacione);
            $em->flush();

            return $this->redirectToRoute('prestaciones_edit', array('id' => $prestacione->getIdPrestaciones()));
        }

        return $this->render('prestaciones/edit.html.twig', array(
            'prestacione' => $prestacione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Prestaciones entity.
     *
     */
    public function deleteAction(Request $request, Prestaciones $prestacione)
    {
        $form = $this->createDeleteForm($prestacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prestacione);
            $em->flush();
        }

        return $this->redirectToRoute('prestaciones_index');
    }

    /**
     * Creates a form to delete a Prestaciones entity.
     *
     * @param Prestaciones $prestacione The Prestaciones entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prestaciones $prestacione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prestaciones_delete', array('id' => $prestacione->getIdPrestaciones())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
