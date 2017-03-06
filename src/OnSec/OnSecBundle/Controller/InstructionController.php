<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Instruction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Instruction controller.
 *
 */
class InstructionController extends Controller
{
    /**
     * Lists all instruction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instructions = $em->getRepository('HSDOnSecBundle:Instruction')->findAll();

        return $this->render('instruction/index.html.twig', array(
            'instructions' => $instructions,
        ));
    }

    /**
     * Creates a new instruction entity.
     *
     */
    public function newAction(Request $request)
    {
        $instruction = new Instruction();
        $form = $this->createForm('OnSec\OnSecBundle\Form\InstructionType', $instruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instruction);
            $em->flush($instruction);

            return $this->redirectToRoute('instruction_show', array('id' => $instruction->getId()));
        }

        return $this->render('instruction/new.html.twig', array(
            'instruction' => $instruction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a instruction entity.
     *
     */
    public function showAction(Instruction $instruction)
    {
        $deleteForm = $this->createDeleteForm($instruction);

        return $this->render('instruction/show.html.twig', array(
            'instruction' => $instruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing instruction entity.
     *
     */
    public function editAction(Request $request, Instruction $instruction)
    {
        $deleteForm = $this->createDeleteForm($instruction);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\InstructionType', $instruction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instruction_edit', array('id' => $instruction->getId()));
        }

        return $this->render('instruction/edit.html.twig', array(
            'instruction' => $instruction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a instruction entity.
     *
     */
    public function deleteAction(Request $request, Instruction $instruction)
    {
        $form = $this->createDeleteForm($instruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instruction);
            $em->flush();
        }

        return $this->redirectToRoute('instruction_index');
    }

    /**
     * Creates a form to delete a instruction entity.
     *
     * @param Instruction $instruction The instruction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Instruction $instruction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instruction_delete', array('id' => $instruction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a instruction entity.
     *
     */
    public function runAction(Instruction $instruction)
    {
        $deleteForm = $this->createDeleteForm($instruction);

        return $this->render('instruction/run.html.twig', array(
            'instruction' => $instruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
