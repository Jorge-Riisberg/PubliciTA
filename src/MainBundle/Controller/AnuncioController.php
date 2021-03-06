<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Anuncio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Anuncio controller.
 *
 */
class AnuncioController extends Controller
{


    /**
     * Listar todos los anuncios de una categoria
     *
     */
    public function categoriaAction($categoriaId)
    {
        $em = $this->getDoctrine()->getManager();

        $categoria = $em->getRepository('MainBundle:Categoria')->findOneById($categoriaId);

        $categorias = $em->getRepository('MainBundle:Categoria')->findAll();

        $anuncios = $em->getRepository('MainBundle:Anuncio');

        $query = $anuncios->createQueryBuilder('a')
            ->innerJoin('a.categorias', 'c')
            ->where('c.id = :categoria_id')
            ->setParameter('categoria_id', $categoriaId)
            ->getQuery()->getResult();           

        return $this->render('anuncio/categoria.html.twig', array(
            'anuncios' => $query,
            'categoria' => $categoria->getNombre(),
            'categorias' => $categorias
        ));
    }

    /**
     * Lists all anuncio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anuncios = $em->getRepository('MainBundle:Anuncio')->findAll();

        $categorias = $em->getRepository('MainBundle:Categoria')->findAll();

        return $this->render('anuncio/index.html.twig', array(
            'anuncios' => $anuncios,
            'categorias' => $categorias
        ));
    }

    /**
     * Creates a new anuncio entity.
     *
     */
    public function newAction(Request $request)
    {
        $anuncio = new Anuncio();
        $form = $this->createForm('MainBundle\Form\AnuncioType', $anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($anuncio);
            $em->flush();

            return $this->redirectToRoute('anuncio_show', array('id' => $anuncio->getId()));
        }

        return $this->render('anuncio/new.html.twig', array(
            'anuncio' => $anuncio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a anuncio entity.
     *
     */
    public function showAction(Anuncio $anuncio)
    {
        $deleteForm = $this->createDeleteForm($anuncio);

        return $this->render('anuncio/show.html.twig', array(
            'anuncio' => $anuncio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing anuncio entity.
     *
     */
    public function editAction(Request $request, Anuncio $anuncio)
    {
        $deleteForm = $this->createDeleteForm($anuncio);
        $editForm = $this->createForm('MainBundle\Form\AnuncioType', $anuncio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anuncio_edit', array('id' => $anuncio->getId()));
        }

        return $this->render('anuncio/edit.html.twig', array(
            'anuncio' => $anuncio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a anuncio entity.
     *
     */
    public function deleteAction(Request $request, Anuncio $anuncio)
    {
        $form = $this->createDeleteForm($anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anuncio);
            $em->flush();
        }

        return $this->redirectToRoute('anuncio_index');
    }

    /**
     * Creates a form to delete a anuncio entity.
     *
     * @param Anuncio $anuncio The anuncio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Anuncio $anuncio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anuncio_delete', array('id' => $anuncio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
