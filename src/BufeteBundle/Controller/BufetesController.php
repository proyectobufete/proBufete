<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Bufetes;
use BufeteBundle\Form\BufetesType;

/**
 * Bufetes controller.
 *
 */
class BufetesController extends Controller
{
    /**
     * Lists all Bufetes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bufetes = $em->getRepository('BufeteBundle:Bufetes')->findAll();

        return $this->render('bufetes/index.html.twig', array(
            'bufetes' => $bufetes,
        ));
    }

    /**
     * Creates a new Bufetes entity.
     *
     */
    public function newAction(Request $request)
    {
        $bufete = new Bufetes();
        $form = $this->createForm('BufeteBundle\Form\BufetesType', $bufete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bufete);
            $em->flush();

            return $this->redirectToRoute('bufetes_show', array('id' => $bufete->getIdBufete()));
        }

        return $this->render('bufetes/new.html.twig', array(
            'bufete' => $bufete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bufetes entity.
     *
     */
    public function showAction(Bufetes $bufete)
    {
        $deleteForm = $this->createDeleteForm($bufete);

        return $this->render('bufetes/show.html.twig', array(
            'bufete' => $bufete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bufetes entity.
     *
     */
    public function editAction(Request $request, Bufetes $bufete)
    {
        $deleteForm = $this->createDeleteForm($bufete);
        $editForm = $this->createForm('BufeteBundle\Form\BufetesType', $bufete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bufete);
            $em->flush();

            return $this->redirectToRoute('bufetes_edit', array('id' => $bufete->getIdBufete()));
        }

        return $this->render('bufetes/edit.html.twig', array(
            'bufete' => $bufete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Bufetes entity.
     *
     */
    public function deleteAction(Request $request, Bufetes $bufete)
    {
        $form = $this->createDeleteForm($bufete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bufete);
            $em->flush();
        }

        return $this->redirectToRoute('bufetes_index');
    }

    /**
     * Creates a form to delete a Bufetes entity.
     *
     * @param Bufetes $bufete The Bufetes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bufetes $bufete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bufetes_delete', array('id' => $bufete->getIdBufete())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
