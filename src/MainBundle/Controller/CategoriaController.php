<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Categoria;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorium controller.
 *
 */
class CategoriaController extends Controller
{
    /**
     * Lists all categorium entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorias = $em->getRepository('MainBundle:Categoria')->findAll();

        return $this->render('categoria/index.html.twig', array(
            'categorias' => $categorias,
        ));
    }

    /**
     * Creates a new categorium entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorium = new Categoria();
        $form = $this->createForm('MainBundle\Form\CategoriaType', $categorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorium);
            $em->flush();

            return $this->redirectToRoute('categoria_show', array('id' => $categorium->getId()));
        }

        return $this->render('categoria/new.html.twig', array(
            'categorium' => $categorium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorium entity.
     *
     */
    public function showAction(Categoria $categorium)
    {
        $deleteForm = $this->createDeleteForm($categorium);

        return $this->render('categoria/show.html.twig', array(
            'categorium' => $categorium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorium entity.
     *
     */
    public function editAction(Request $request, Categoria $categorium)
    {
        $deleteForm = $this->createDeleteForm($categorium);
        $editForm = $this->createForm('MainBundle\Form\CategoriaType', $categorium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoria_edit', array('id' => $categorium->getId()));
        }

        return $this->render('categoria/edit.html.twig', array(
            'categorium' => $categorium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorium entity.
     *
     */
    public function deleteAction(Request $request, Categoria $categorium)
    {
        $form = $this->createDeleteForm($categorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorium);
            $em->flush();
        }

        return $this->redirectToRoute('categoria_index');
    }

    /**
     * Creates a form to delete a categorium entity.
     *
     * @param Categoria $categorium The categorium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categoria $categorium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoria_delete', array('id' => $categorium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
