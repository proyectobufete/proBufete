<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Paises;
use BufeteBundle\Form\PaisesType;

/**
 * Paises controller.
 *
 */
class PaisesController extends Controller
{
    /**
     * Lists all Paises entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paises = $em->getRepository('BufeteBundle:Paises')->findAll();

        return $this->render('paises/index.html.twig', array(
            'paises' => $paises,
        ));
    }

    /**
     * Creates a new Paises entity.
     *
     */
    public function newAction(Request $request)
    {
        $paise = new Paises();
        $form = $this->createForm('BufeteBundle\Form\PaisesType', $paise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paise);
            $em->flush();

            return $this->redirectToRoute('paises_show', array('id' => $paise->getIdPais()));
        }

        return $this->render('paises/new.html.twig', array(
            'paise' => $paise,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paises entity.
     *
     */
    public function showAction(Paises $paise)
    {
        $deleteForm = $this->createDeleteForm($paise);

        return $this->render('paises/show.html.twig', array(
            'paise' => $paise,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Paises entity.
     *
     */
    public function editAction(Request $request, Paises $paise)
    {
        $deleteForm = $this->createDeleteForm($paise);
        $editForm = $this->createForm('BufeteBundle\Form\PaisesType', $paise);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paise);
            $em->flush();

            return $this->redirectToRoute('paises_edit', array('id' => $paise->getIdPais()));
        }

        return $this->render('paises/edit.html.twig', array(
            'paise' => $paise,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Paises entity.
     *
     */
    public function deleteAction(Request $request, Paises $paise)
    {
        $form = $this->createDeleteForm($paise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paise);
            $em->flush();
        }

        return $this->redirectToRoute('paises_index');
    }

    /**
     * Creates a form to delete a Paises entity.
     *
     * @param Paises $paise The Paises entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paises $paise)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paises_delete', array('id' => $paise->getIdPais())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
