<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Kurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Kur controller.
 *
 * @Route("kurs")
 */
class KursController extends Controller
{
    /**
     * Lists all kur entities.
     *
     * @Route("/", name="kurs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kurs = $em->getRepository('HSDOnSecBundle:Kurs')->findAll();

        return $this->render('kurs/index.html.twig', array(
            'kurs' => $kurs,
        ));
    }

    /**
     * Creates a new kur entity.
     *
     * @Route("/new", name="kurs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kur = new Kur();
        $form = $this->createForm('OnSec\OnSecBundle\Form\KursType', $kur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kur);
            $em->flush($kur);

            return $this->redirectToRoute('kurs_show', array('id' => $kur->getId()));
        }

        return $this->render('kurs/new.html.twig', array(
            'kur' => $kur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kur entity.
     *
     * @Route("/{id}", name="kurs_show")
     * @Method("GET")
     */
    public function showAction(Kurs $kur)
    {
        $deleteForm = $this->createDeleteForm($kur);

        return $this->render('kurs/show.html.twig', array(
            'kur' => $kur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kur entity.
     *
     * @Route("/{id}/edit", name="kurs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Kurs $kur)
    {
        $deleteForm = $this->createDeleteForm($kur);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\KursType', $kur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kurs_edit', array('id' => $kur->getId()));
        }

        return $this->render('kurs/edit.html.twig', array(
            'kur' => $kur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kur entity.
     *
     * @Route("/{id}", name="kurs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Kurs $kur)
    {
        $form = $this->createDeleteForm($kur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kur);
            $em->flush($kur);
        }

        return $this->redirectToRoute('kurs_index');
    }

    /**
     * Creates a form to delete a kur entity.
     *
     * @param Kurs $kur The kur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kurs $kur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kurs_delete', array('id' => $kur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
