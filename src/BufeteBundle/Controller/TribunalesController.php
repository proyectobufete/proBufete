<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Tribunales;
use BufeteBundle\Form\TribunalesType;

/**
 * Tribunales controller.
 *
 */
class TribunalesController extends Controller
{
    /**
     * Lists all Tribunales entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tribunales = $em->getRepository('BufeteBundle:Tribunales')->findAll();

        return $this->render('tribunales/index.html.twig', array(
            'tribunales' => $tribunales,
        ));
    }

    /**
     * Creates a new Tribunales entity.
     *
     */
    public function newAction(Request $request)
    {
        $tribunale = new Tribunales();
        $form = $this->createForm('BufeteBundle\Form\TribunalesType', $tribunale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tribunale);
            $em->flush();

            return $this->redirectToRoute('tribunales_show', array('id' => $tribunale->getIdTribunal()));
        }

        return $this->render('tribunales/new.html.twig', array(
            'tribunale' => $tribunale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tribunales entity.
     *
     */
    public function showAction(Tribunales $tribunale)
    {
        $deleteForm = $this->createDeleteForm($tribunale);

        return $this->render('tribunales/show.html.twig', array(
            'tribunale' => $tribunale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tribunales entity.
     *
     */
    public function editAction(Request $request, Tribunales $tribunale)
    {
        $deleteForm = $this->createDeleteForm($tribunale);
        $editForm = $this->createForm('BufeteBundle\Form\TribunalesType', $tribunale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tribunale);
            $em->flush();

            return $this->redirectToRoute('tribunales_edit', array('id' => $tribunale->getIdTribunal()));
        }

        return $this->render('tribunales/edit.html.twig', array(
            'tribunale' => $tribunale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tribunales entity.
     *
     */
    public function deleteAction(Request $request, Tribunales $tribunale)
    {
        $form = $this->createDeleteForm($tribunale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tribunale);
            $em->flush();
        }

        return $this->redirectToRoute('tribunales_index');
    }

    /**
     * Creates a form to delete a Tribunales entity.
     *
     * @param Tribunales $tribunale The Tribunales entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tribunales $tribunale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tribunales_delete', array('id' => $tribunale->getIdTribunal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
