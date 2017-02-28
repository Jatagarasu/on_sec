<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Antwort;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Antwort controller.
 *
 * @Route("antwort")
 */
class AntwortController extends Controller
{
    /**
     * Lists all antwort entities.
     *
     * @Route("/", name="antwort_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $antworts = $em->getRepository('HSDOnSecBundle:Antwort')->findAll();

        return $this->render('antwort/index.html.twig', array(
            'antworts' => $antworts,
        ));
    }

    /**
     * Creates a new antwort entity.
     *
     * @Route("/new", name="antwort_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $antwort = new Antwort();
        $form = $this->createForm('OnSec\OnSecBundle\Form\AntwortType', $antwort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($antwort);
            $em->flush($antwort);

            return $this->redirectToRoute('antwort_show', array('id' => $antwort->getId()));
        }

        return $this->render('antwort/new.html.twig', array(
            'antwort' => $antwort,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a antwort entity.
     *
     * @Route("/{id}", name="antwort_show")
     * @Method("GET")
     */
    public function showAction(Antwort $antwort)
    {
        $deleteForm = $this->createDeleteForm($antwort);

        return $this->render('antwort/show.html.twig', array(
            'antwort' => $antwort,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing antwort entity.
     *
     * @Route("/{id}/edit", name="antwort_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Antwort $antwort)
    {
        $deleteForm = $this->createDeleteForm($antwort);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\AntwortType', $antwort);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('antwort_edit', array('id' => $antwort->getId()));
        }

        return $this->render('antwort/edit.html.twig', array(
            'antwort' => $antwort,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a antwort entity.
     *
     * @Route("/{id}", name="antwort_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Antwort $antwort)
    {
        $form = $this->createDeleteForm($antwort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($antwort);
            $em->flush($antwort);
        }

        return $this->redirectToRoute('antwort_index');
    }

    /**
     * Creates a form to delete a antwort entity.
     *
     * @param Antwort $antwort The antwort entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Antwort $antwort)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('antwort_delete', array('id' => $antwort->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
