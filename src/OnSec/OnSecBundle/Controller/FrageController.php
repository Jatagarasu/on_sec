<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Frage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Frage controller.
 *
 * @Route("frage")
 */
class FrageController extends Controller
{
    /**
     * Lists all frage entities.
     *
     * @Route("/", name="frage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $frages = $em->getRepository('HSDOnSecBundle:Frage')->findAll();

        return $this->render('frage/index.html.twig', array(
            'frages' => $frages,
        ));
    }

    /**
     * Creates a new frage entity.
     *
     * @Route("/new", name="frage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $frage = new Frage();
        $form = $this->createForm('OnSec\OnSecBundle\Form\FrageType', $frage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($frage);
            $em->flush($frage);

            return $this->redirectToRoute('frage_show', array('id' => $frage->getId()));
        }

        return $this->render('frage/new.html.twig', array(
            'frage' => $frage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a frage entity.
     *
     * @Route("/{id}", name="frage_show")
     * @Method("GET")
     */
    public function showAction(Frage $frage)
    {
        $deleteForm = $this->createDeleteForm($frage);

        return $this->render('frage/show.html.twig', array(
            'frage' => $frage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing frage entity.
     *
     * @Route("/{id}/edit", name="frage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Frage $frage)
    {
        $deleteForm = $this->createDeleteForm($frage);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\FrageType', $frage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('frage_edit', array('id' => $frage->getId()));
        }

        return $this->render('frage/edit.html.twig', array(
            'frage' => $frage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a frage entity.
     *
     * @Route("/{id}", name="frage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Frage $frage)
    {
        $form = $this->createDeleteForm($frage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($frage);
            $em->flush($frage);
        }

        return $this->redirectToRoute('frage_index');
    }

    /**
     * Creates a form to delete a frage entity.
     *
     * @param Frage $frage The frage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Frage $frage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('frage_delete', array('id' => $frage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
