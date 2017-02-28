<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Rolle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rolle controller.
 *
 * @Route("rolle")
 */
class RolleController extends Controller
{
    /**
     * Lists all rolle entities.
     *
     * @Route("/", name="rolle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rolles = $em->getRepository('HSDOnSecBundle:Rolle')->findAll();

        return $this->render('rolle/index.html.twig', array(
            'rolles' => $rolles,
        ));
    }

    /**
     * Creates a new rolle entity.
     *
     * @Route("/new", name="rolle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rolle = new Rolle();
        $form = $this->createForm('OnSec\OnSecBundle\Form\RolleType', $rolle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rolle);
            $em->flush($rolle);

            return $this->redirectToRoute('rolle_show', array('id' => $rolle->getId()));
        }

        return $this->render('rolle/new.html.twig', array(
            'rolle' => $rolle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rolle entity.
     *
     * @Route("/{id}", name="rolle_show")
     * @Method("GET")
     */
    public function showAction(Rolle $rolle)
    {
        $deleteForm = $this->createDeleteForm($rolle);

        return $this->render('rolle/show.html.twig', array(
            'rolle' => $rolle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rolle entity.
     *
     * @Route("/{id}/edit", name="rolle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rolle $rolle)
    {
        $deleteForm = $this->createDeleteForm($rolle);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\RolleType', $rolle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rolle_edit', array('id' => $rolle->getId()));
        }

        return $this->render('rolle/edit.html.twig', array(
            'rolle' => $rolle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rolle entity.
     *
     * @Route("/{id}", name="rolle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rolle $rolle)
    {
        $form = $this->createDeleteForm($rolle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rolle);
            $em->flush($rolle);
        }

        return $this->redirectToRoute('rolle_index');
    }

    /**
     * Creates a form to delete a rolle entity.
     *
     * @param Rolle $rolle The rolle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rolle $rolle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rolle_delete', array('id' => $rolle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
