<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\CompletedInstruction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use OnSec\OnSecBundle\Entity\User;
use OnSec\OnSecBundle\Entity\Instruction;

/**
 * Completedinstruction controller.
 *
 */
class CompletedInstructionController extends Controller
{
    /**
     * Lists all completedInstruction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $completedInstructions = $em->getRepository('HSDOnSecBundle:CompletedInstruction')->findAll();

        return $this->render('completedinstruction/index.html.twig', array(
            'completedInstructions' => $completedInstructions,
        ));
    }

    /**
     * Creates a new completedInstruction entity.
     *
     */
    public function newAction(Request $request)
    {
        $completedInstruction = new Completedinstruction();
        $form = $this->createForm('OnSec\OnSecBundle\Form\CompletedInstructionType', $completedInstruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($completedInstruction);
            $em->flush($completedInstruction);

            return $this->redirectToRoute('completedinstruction_show', array('id' => $completedInstruction->getId()));
        }

        return $this->render('completedinstruction/new.html.twig', array(
            'completedInstruction' => $completedInstruction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a completedInstruction entity.
     *
     */
    public function showAction(CompletedInstruction $completedInstruction)
    {
        $deleteForm = $this->createDeleteForm($completedInstruction);

        return $this->render('completedinstruction/show.html.twig', array(
            'completedInstruction' => $completedInstruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing completedInstruction entity.
     *
     */
    public function editAction(Request $request, CompletedInstruction $completedInstruction)
    {
        $deleteForm = $this->createDeleteForm($completedInstruction);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\CompletedInstructionType', $completedInstruction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('completedinstruction_edit', array('id' => $completedInstruction->getId()));
        }

        return $this->render('completedinstruction/edit.html.twig', array(
            'completedInstruction' => $completedInstruction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a completedInstruction entity.
     *
     */
    public function deleteAction(Request $request, CompletedInstruction $completedInstruction)
    {
        $form = $this->createDeleteForm($completedInstruction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($completedInstruction);
            $em->flush();
        }

        return $this->redirectToRoute('completedinstruction_index');
    }

    /**
     * Creates a form to delete a completedInstruction entity.
     *
     * @param CompletedInstruction $completedInstruction The completedInstruction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompletedInstruction $completedInstruction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('completedinstruction_delete', array('id' => $completedInstruction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function saveCompletedInstruction(Instruction $instruction, User $user){

        $em = $this->getDoctrine()->getManager();

        $completedInstruction = new CompletedInstruction();
        $completedInstruction->setUser($user);
        $completedInstruction->setInstruction($instruction);

        $em->persist($completedInstruction);

    }
}
