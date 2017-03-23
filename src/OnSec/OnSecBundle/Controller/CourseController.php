<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Course;
use OnSec\OnSecBundle\Entity\User;
use OnSec\OnSecBundle\HSDOnSecBundle;
use OnSec\OnSecBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Course controller.
 *
 */
class CourseController extends Controller
{

    /**
     * Lists all course entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        return $this->render('course/index.html.twig', array(
            'courses' => $courses,
        ));
    }

    /**
     * Creates a new course entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$rooms = $em->getRepository('HSDOnSecBundle:Room')->findAll();  //neu

        $course = new Course();

        $form = $this->createForm('OnSec\OnSecBundle\Form\CourseType', $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userids = $request->get('moderatorId');

            if(!empty($userids)){
                foreach ($userids as $userid){
                    $user = $em->getRepository('HSDOnSecBundle:User')->find($userid);
                    $course->addModerator($user);

                }
            }

            $instructionids = $request->get('instructionId');

            foreach($instructionids as $instructionid){

                $instruction = $em->getRepository('HSDOnSecBundle:Instruction')->find($instructionid);
                $course->addInstruction($instruction);
            }

            $roomids = $request->get('roomId');

            if(!empty($roomids)){
                foreach($roomids as $roomid){
                    $room = $em->getRepository('HSDOnSecBundle:Room')->find($roomid);
                    $course->setRoom($room);
                }
            }

            /*$owner = $em->getRepository('HSDOnSecBundle:User')->find(app.user.id);
            $course->setOwner($owner);*/

            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush($course);

            return $this->redirectToRoute('course_show', array('id' => $course->getId()));
        }

        return $this->render('course/new.html.twig', array(
            'course' => $course,
            //'rooms' => $rooms,   //neu dazu
            //'users' => $users,  // neu dazu
            'form' => $form->createView(),
        ));
    }

    /**
     * newCourse Autocomplete for Moderators
     *
     */

    public function autocomplete_roomAction(Request $request){

        $rooms = array();
        $instructions = array();

        $term = trim(strip_tags($request->get('term')));

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HSDOnSecBundle:Room')->search($term);

        foreach ($entities as $entity){

            foreach($entity->getInstructions() as $instruction){

                array_push($instructions, array(
                    'label'=>$instruction->getDescription(),
                    'value'=>$instruction->getDescription(),
                    'id'=>$instruction->getId()));
            }

            array_push($rooms, array(
                'label'=>$entity->getDescription(),
                'value'=>$entity->getDescription(),
                'instructions'=> $instructions,
                'id'=>$entity->getId()));

        }

        $response = new JsonResponse();
        $response->setData($rooms);

        return $response;
    }

    public function autocomplete_instructionAction(Request $request){

        $instructions = array();

        $term = trim(strip_tags($request->get('term')));

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HSDOnSecBundle:Instruction')->search($term);

        foreach ($entities as $entity){
            //$instructions[] = $entity->getDescription();

            array_push($instructions, array(
                'label'=>$entity->getDescription(),
                'value'=>$entity->getDescription(),
                'id'=>$entity->getId()));
        }

        $response = new JsonResponse();
        $response->setData($instructions);

        return $response;
    }

    public function autocomplete_userAction(Request $request){

        $moderators = array();

        $term = trim(strip_tags($request->get('term')));

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HSDOnSecBundle:User')->search($term);

        foreach ($entities as $entity){

            array_push($moderators, array(
                                'label'=>$entity->getFirstname()." ".$entity->getSurname()." (".$entity->getEmail().")",
                                'value'=>$entity->getFirstname()." ".$entity->getSurname(),
                                'id'=>$entity->getId()));
        }
        $response = new JsonResponse();
        $response->setData($moderators);

        return $response;
    }

    /**
     * Finds and displays a course entity.
     *
     */
    public function showAction(Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);

        return $this->render('course/show.html.twig', array(
            'course' => $course,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing course entity.
     *
     */
    public function editAction(Request $request, Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $editForm = $this->createForm('OnSec\OnSecBundle\Form\CourseType', $course);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('course_edit', array('id' => $course->getId()));
        }

        return $this->render('course/edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a course entity.
     *
     */
    public function deleteAction(Request $request, Course $course)
    {
        $form = $this->createDeleteForm($course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($course);
            $em->flush();
        }

        return $this->redirectToRoute('course_index');
    }

    /**
     * Creates a form to delete a course entity.
     *
     * @param Course $course The course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Course $course)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('course_delete', array('id' => $course->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
