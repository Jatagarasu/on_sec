<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\CompletedInstruction;
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

        return $this->render('HSDOnSecBundle:Instruction:index.html.twig', array(
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

            $expireTimeInDays = $instruction->getExpiretime() * 182;
            $instruction->setExpiretime($expireTimeInDays);

            foreach ($instruction->getQuestions() as $question) {
                foreach ($question->getAnswers() as $answer) {
                    $answer->setQuestion($question);
                }
            }

            $moderatorIds = $request->get('moderatorId');

            if(!empty($moderatorIds)){
                foreach ($moderatorIds as $userid){
                    $user = $em->getRepository('HSDOnSecBundle:User')->find($userid);
                    $instruction->addModerator($user);

                }
            }

            $currentUser = $this->get('security.token_storage')->getToken()->getUser();
            $instruction->setOwner($currentUser);

            $em->persist($instruction);
            $em->flush($instruction);

            return $this->redirectToRoute('instruction_show', array('id' => $instruction->getId()));
        }

        return $this->render('HSDOnSecBundle:Instruction:new.html.twig', array(
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

        return $this->render('HSDOnSecBundle:Instruction:show.html.twig', array(
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
            $em = $this->getDoctrine()->getManager();

            foreach ($instruction->getQuestions() as $question) {
                foreach ($question->getAnswers() as $answer) {
                    $answer->setQuestion($question);
                }
            }

            $moderatorIds = $request->get('moderatorId');
            $moderators = [];

            if(!empty($moderatorIds)){
                foreach ($moderatorIds as $userid){
                    $user = $em->getRepository('HSDOnSecBundle:User')->find($userid);
                    $moderators[] = $user;
                    // $instruction->addModerator($user);
                }

                $instruction->setModerators($moderators);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instruction_show', array('id' => $instruction->getId()));
        }

        return $this->render('HSDOnSecBundle:Instruction:edit.html.twig', array(
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
            $instruction->getKeywords()->clear();
            $instruction->getQuestions()->clear();
            $instruction->getModerators()->clear();
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

        return $this->render('HSDOnSecBundle:Instruction:run.html.twig', array(
            'instruction' => $instruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a instruction entity.
     *
     */
    public function runQuestionsAction(Instruction $instruction)
    {
        $deleteForm = $this->createDeleteForm($instruction);

        return $this->render('HSDOnSecBundle:Instruction:runQuestions.html.twig', array(
            'instruction' => $instruction,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
