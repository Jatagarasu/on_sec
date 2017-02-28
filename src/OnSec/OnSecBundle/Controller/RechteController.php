<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Rechte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rechte controller.
 *
 * @Route("rechte")
 */
class RechteController extends Controller
{
    /**
     * Lists all rechte entities.
     *
     * @Route("/", name="rechte_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rechtes = $em->getRepository('HSDOnSecBundle:Rechte')->findAll();

        return $this->render('rechte/index.html.twig', array(
            'rechtes' => $rechtes,
        ));
    }

    /**
     * Creates a new rechte entity.
     *
     * @Route("/new", name="rechte_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rechte = new Rechte();
        $form = $this->createForm('OnSec\OnSecBundle\Form\RechteType', $rechte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rechte);
            $em->flush($rechte);

            return $this->redirectToRoute('rechte_show', array('id' => $rechte->getId()));
        }

        return $this->render('rechte/new.html.twig', array(
            'rechte' => $rechte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rechte entity.
     *
     * @Route("/{id}", name="rechte_show")
     * @Method("GET")
     */
    public function showAction(Rechte $rechte)
    {
        $deleteForm = $this->createDeleteForm($rechte);

        return $this->render('rechte/show.html.twig', array(
            'rechte' => $rechte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rechte entity.
     *
     * @Route("/{id}/edit", name="rechte_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rechte $rechte)
    {
        $deleteForm = $this->createDeleteForm($rechte);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\RechteType', $rechte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rechte_edit', array('id' => $rechte->getId()));
        }

        return $this->render('rechte/edit.html.twig', array(
            'rechte' => $rechte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rechte entity.
     *
     * @Route("/{id}", name="rechte_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rechte $rechte)
    {
        $form = $this->createDeleteForm($rechte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rechte);
            $em->flush($rechte);
        }

        return $this->redirectToRoute('rechte_index');
    }

    /**
     * Creates a form to delete a rechte entity.
     *
     * @param Rechte $rechte The rechte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rechte $rechte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rechte_delete', array('id' => $rechte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
