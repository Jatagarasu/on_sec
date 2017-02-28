<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Unterweisung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Unterweisung controller.
 *
 * @Route("unterweisung")
 */
class UnterweisungController extends Controller
{
    /**
     * Lists all unterweisung entities.
     *
     * @Route("/", name="unterweisung_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $unterweisungs = $em->getRepository('HSDOnSecBundle:Unterweisung')->findAll();

        return $this->render('unterweisung/index.html.twig', array(
            'unterweisungs' => $unterweisungs,
        ));
    }

    /**
     * Creates a new unterweisung entity.
     *
     * @Route("/new", name="unterweisung_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $unterweisung = new Unterweisung();
        $form = $this->createForm('OnSec\OnSecBundle\Form\UnterweisungType', $unterweisung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unterweisung);
            $em->flush($unterweisung);

            return $this->redirectToRoute('unterweisung_show', array('id' => $unterweisung->getId()));
        }

        return $this->render('unterweisung/new.html.twig', array(
            'unterweisung' => $unterweisung,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a unterweisung entity.
     *
     * @Route("/{id}", name="unterweisung_show")
     * @Method("GET")
     */
    public function showAction(Unterweisung $unterweisung)
    {
        $deleteForm = $this->createDeleteForm($unterweisung);

        return $this->render('unterweisung/show.html.twig', array(
            'unterweisung' => $unterweisung,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing unterweisung entity.
     *
     * @Route("/{id}/edit", name="unterweisung_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Unterweisung $unterweisung)
    {
        $deleteForm = $this->createDeleteForm($unterweisung);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\UnterweisungType', $unterweisung);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unterweisung_edit', array('id' => $unterweisung->getId()));
        }

        return $this->render('unterweisung/edit.html.twig', array(
            'unterweisung' => $unterweisung,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a unterweisung entity.
     *
     * @Route("/{id}", name="unterweisung_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Unterweisung $unterweisung)
    {
        $form = $this->createDeleteForm($unterweisung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unterweisung);
            $em->flush($unterweisung);
        }

        return $this->redirectToRoute('unterweisung_index');
    }

    /**
     * Creates a form to delete a unterweisung entity.
     *
     * @param Unterweisung $unterweisung The unterweisung entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Unterweisung $unterweisung)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unterweisung_delete', array('id' => $unterweisung->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
