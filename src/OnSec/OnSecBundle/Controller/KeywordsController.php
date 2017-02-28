<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Keywords;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Keyword controller.
 *
 * @Route("keywords")
 */
class KeywordsController extends Controller
{
    /**
     * Lists all keyword entities.
     *
     * @Route("/", name="keywords_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $keywords = $em->getRepository('HSDOnSecBundle:Keywords')->findAll();

        return $this->render('keywords/index.html.twig', array(
            'keywords' => $keywords,
        ));
    }

    /**
     * Creates a new keyword entity.
     *
     * @Route("/new", name="keywords_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $keyword = new Keyword();
        $form = $this->createForm('OnSec\OnSecBundle\Form\KeywordsType', $keyword);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($keyword);
            $em->flush($keyword);

            return $this->redirectToRoute('keywords_show', array('id' => $keyword->getId()));
        }

        return $this->render('keywords/new.html.twig', array(
            'keyword' => $keyword,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a keyword entity.
     *
     * @Route("/{id}", name="keywords_show")
     * @Method("GET")
     */
    public function showAction(Keywords $keyword)
    {
        $deleteForm = $this->createDeleteForm($keyword);

        return $this->render('keywords/show.html.twig', array(
            'keyword' => $keyword,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing keyword entity.
     *
     * @Route("/{id}/edit", name="keywords_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Keywords $keyword)
    {
        $deleteForm = $this->createDeleteForm($keyword);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\KeywordsType', $keyword);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('keywords_edit', array('id' => $keyword->getId()));
        }

        return $this->render('keywords/edit.html.twig', array(
            'keyword' => $keyword,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a keyword entity.
     *
     * @Route("/{id}", name="keywords_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Keywords $keyword)
    {
        $form = $this->createDeleteForm($keyword);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($keyword);
            $em->flush($keyword);
        }

        return $this->redirectToRoute('keywords_index');
    }

    /**
     * Creates a form to delete a keyword entity.
     *
     * @param Keywords $keyword The keyword entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Keywords $keyword)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('keywords_delete', array('id' => $keyword->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
