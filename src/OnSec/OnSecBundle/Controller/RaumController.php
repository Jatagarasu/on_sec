<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Raum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Raum controller.
 *
 * @Route("raum")
 */
class RaumController extends Controller
{
    /**
     * Lists all raum entities.
     *
     * @Route("/", name="raum_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $raums = $em->getRepository('HSDOnSecBundle:Raum')->findAll();

        return $this->render('raum/index.html.twig', array(
            'raums' => $raums,
        ));
    }

    /**
     * Creates a new raum entity.
     *
     * @Route("/new", name="raum_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $raum = new Raum();
        $form = $this->createForm('OnSec\OnSecBundle\Form\RaumType', $raum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($raum);
            $em->flush($raum);

            return $this->redirectToRoute('raum_show', array('id' => $raum->getId()));
        }

        return $this->render('raum/new.html.twig', array(
            'raum' => $raum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a raum entity.
     *
     * @Route("/{id}", name="raum_show")
     * @Method("GET")
     */
    public function showAction(Raum $raum)
    {
        $deleteForm = $this->createDeleteForm($raum);

        return $this->render('raum/show.html.twig', array(
            'raum' => $raum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing raum entity.
     *
     * @Route("/{id}/edit", name="raum_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Raum $raum)
    {
        $deleteForm = $this->createDeleteForm($raum);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\RaumType', $raum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('raum_edit', array('id' => $raum->getId()));
        }

        return $this->render('raum/edit.html.twig', array(
            'raum' => $raum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a raum entity.
     *
     * @Route("/{id}", name="raum_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Raum $raum)
    {
        $form = $this->createDeleteForm($raum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($raum);
            $em->flush($raum);
        }

        return $this->redirectToRoute('raum_index');
    }

    /**
     * Creates a form to delete a raum entity.
     *
     * @param Raum $raum The raum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Raum $raum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('raum_delete', array('id' => $raum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
