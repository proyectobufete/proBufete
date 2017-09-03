<?php

namespace BufeteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BufeteBundle\Entity\Casos;
use BufeteBundle\Form\CasosType;

/**
 * Casos controller.
 *
 */
class CasosController extends Controller
{
    /**
     * Lists all Casos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $casos = $em->getRepository('BufeteBundle:Casos')->findAll();

        return $this->render('casos/index.html.twig', array(
            'casos' => $casos,
        ));
    }

    /**
     * Creates a new Casos entity.
     *
     */
    public function newAction(Request $request)
    {
        $caso = new Casos();
        $form = $this->createForm('BufeteBundle\Form\CasosType', $caso);
        $form->handleRequest($request);

        $id_estudiante = null;
        $tipo_de_caso = null;
        $mensaje = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $id_estudiante = $form->get('idEstudiante')->getData();
            $tipo_de_caso = $form->get('idTipo')->getData();

            $db = $em->getConnection();
            $query = "SELECT casos.Id_Tipo ,count(casos.Id_Tipo) as Cantidad
            FROM casos
            	INNER JOIN estudiantes
            			ON casos.Id_Estudiante = estudiantes.Id_Estudiante
            	INNER JOIN personas
            			ON estudiantes.Id_Persona = personas.Id_Persona
            where estudiantes.Carne_Estudiante = ? and casos.Estado_Caso = ?
            group by casos.Id_Tipo";
            $stmt = $db->prepare($query);
            $params = array($id_estudiante,2);
            $stmt->execute($params);
            $cantidad = $stmt->fetchAll();

            $civiles = 0;
            $laborales = 0;

            foreach ($cantidad as $cant) {
              if($cant["Id_Tipo"] == 1)
              {
                  $civiles = $cant["Cantidad"];
              }
              elseif ($cant["Id_Tipo"] == 2)
              {
                  $laborales = $cant["Cantidad"];
              }
            }

            if($tipo_de_caso == "Civil"){
              if($civiles < 2){
                $em->persist($caso);
                $em->flush();
                return $this->redirectToRoute('casos_show', array('id' => $caso->getIdCaso()));
              }else{
                $mensaje = "Ha llegado al limite de casos civiles";
              }
            }
            elseif ($tipo_de_caso == "Laboral") {
              if($laborales < 1){
                $em->persist($caso);
                $em->flush();
                return $this->redirectToRoute('casos_show', array('id' => $caso->getIdCaso()));
              } else {
                $mensaje = "Ha llegado al limite de casos laborales";
              }
            }

            //return $this->redirectToRoute('casos_show', array('id' => $caso->getIdCaso()));
        }

        return $this->render('casos/new.html.twig', array(
            'caso' => $caso,
            'form' => $form->createView(),
            'mensaje' => $mensaje
        ));
    }

    /**
     * Finds and displays a Casos entity.
     *
     */
    public function showAction(Casos $caso)
    {
        $deleteForm = $this->createDeleteForm($caso);

        return $this->render('casos/show.html.twig', array(
            'caso' => $caso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Casos entity.
     *
     */
    public function editAction(Request $request, Casos $caso)
    {
        $deleteForm = $this->createDeleteForm($caso);
        $editForm = $this->createForm('BufeteBundle\Form\CasosType', $caso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($caso);
            $em->flush();

            return $this->redirectToRoute('casos_edit', array('id' => $caso->getIdCaso()));
        }

        return $this->render('casos/edit.html.twig', array(
            'caso' => $caso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Casos entity.
     *
     */
    public function deleteAction(Request $request, Casos $caso)
    {
        $form = $this->createDeleteForm($caso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($caso);
            $em->flush();
        }

        return $this->redirectToRoute('casos_index');
    }

    /**
     * Creates a form to delete a Casos entity.
     *
     * @param Casos $caso The Casos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Casos $caso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('casos_delete', array('id' => $caso->getIdCaso())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
