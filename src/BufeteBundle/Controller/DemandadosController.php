<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Demandados;
use BufeteBundle\Form\DemandadosType;

/**
 * Demandados controller.
 *
 */
class DemandadosController extends Controller
{
    /**
     * Lists all Demandados entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandados = $em->getRepository('BufeteBundle:Demandados')->findAll();

        return $this->render('demandados/index.html.twig', array(
            'demandados' => $demandados,
        ));
    }

    /**
     * Creates a new Demandados entity.
     *
     */
    public function newAction(Request $request)
    {
        $demandado = new Demandados();
        $form = $this->createForm('BufeteBundle\Form\DemandadosType', $demandado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandado);
            $em->flush();

            return $this->redirectToRoute('demandados_show', array('id' => $demandado->getIdDemandado()));
        }

        return $this->render('demandados/new.html.twig', array(
            'demandado' => $demandado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Demandados entity.
     *
     */
    public function showAction(Demandados $demandado)
    {
        $deleteForm = $this->createDeleteForm($demandado);

        return $this->render('demandados/show.html.twig', array(
            'demandado' => $demandado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Demandados entity.
     *
     */
    public function editAction(Request $request, Demandados $demandado)
    {
        $deleteForm = $this->createDeleteForm($demandado);
        $editForm = $this->createForm('BufeteBundle\Form\DemandadosType', $demandado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandado);
            $em->flush();

            return $this->redirectToRoute('demandados_edit', array('id' => $demandado->getIdDemandado()));
        }

        return $this->render('demandados/edit.html.twig', array(
            'demandado' => $demandado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Demandados entity.
     *
     */
    public function deleteAction(Request $request, Demandados $demandado)
    {
        $form = $this->createDeleteForm($demandado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandado);
            $em->flush();
        }

        return $this->redirectToRoute('demandados_index');
    }

    /**
     * Creates a form to delete a Demandados entity.
     *
     * @param Demandados $demandado The Demandados entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demandados $demandado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandados_delete', array('id' => $demandado->getIdDemandado())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
