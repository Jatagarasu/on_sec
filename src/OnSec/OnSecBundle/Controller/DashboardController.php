<?php

namespace OnSec\OnSecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    protected $ownerinstructions;
    protected $moderatorinstructions;
    protected $userinstructions;

    public function indexAction()
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $UserId = $this->get('security.token_storage')->getToken()->getUser()->getId();

            $this->getOwnInstructions($UserId);

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('HSDOnSecBundle:User')->find($UserId);

            return $this->render('HSDOnSecBundle:Dashboard:index.html.twig', array(
                'moderatorcourses' => $this->getCoursesByUserId($UserId),
                'ownerinstructions' => $this->ownerinstructions,
                'moderatorinstructions' => $this->moderatorinstructions,
                'userinstructions' => $this->userinstructions,
                'subscribercourses' => $this->getsubscribedCourses($UserId),
                'user' => $user,
            ));
        }
        else {
            return $this->redirectToRoute('login');
        }
    }


    public function modalAction($course)
    {
        return $this->render('HSDOnSecBundle:Dashboard:modal.html.twig', array(
            'course' => $course,
        ));
    }

    private function getCoursesByUserId($userId)
    {
        $usercourses = array();

        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        foreach ($courses as $course)
        {
            foreach ($course->getModerators() as $moderator)
            {
                if($moderator->getId() == $userId)
                    array_push($usercourses, $course);
            }
        }
        return $usercourses;
    }

    private function getOwnInstructions($userId)
    {
        $this->ownerinstructions = array();
        $this->moderatorinstructions = array();
        $this->userinstructions = array();

        $em = $this->getDoctrine()->getManager();

        $instructions = $em->getRepository('HSDOnSecBundle:Instruction')->findAll();

        foreach ($instructions as $instruction)
        {
            $alreadyFound = false;
            if($instruction->getOwner()->getId() == $userId)
            {
                array_push($this->ownerinstructions, $instruction);
                $alreadyFound = true;
            }
            else
            {
                $moderators = $instruction->getModerators();
                foreach ($moderators as $moderator)
                {
                    if($moderator->getId() == $userId)
                    {
                        array_push($this->moderatorinstructions, $instruction);
                        $alreadyFound = true;
                        break;
                    }
                }
            }
            if(!$alreadyFound)
                array_push($this->userinstructions, $instruction);
        }
    }

    private function getsubscribedCourses($userId)
    {
        $subscribedCourses = array();

        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        foreach ($courses as $course)
        {
            $forSubscribers = $course->getSubscribers();
            foreach($forSubscribers as $subscriber)
            {
                if($subscriber->getId() == $userId)
                {
                    array_push($subscribedCourses, $course);
                }
            }
        }
        return $subscribedCourses;
    }

    public function createCSVAction($course_id)
    {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('HSDOnSecBundle:Course')->find($course_id);
        $response = new StreamedResponse();
        $response->setCallback(function() use ($course) {
            $handle = fopen('php://output', 'w+');

            // Add the header of the CSV file
            fputcsv($handle, array('Name', 'Vorname', 'E-Mail', 'Anzahl fehlender Unterweisungen'),';');


            foreach ($course->getSubscribers() as $subscriber) {
                $user = $subscriber->getUser();
                $surname = $user->getSurname();
                $firstname = $user->getFirstname();
                $email = $user->getEmail();
                $progress=0;

                foreach ($user->getCompletedInstructions() as $completed_instruction) {
                    foreach ($course->getInstructions() as $course_instruction) {
                        if ($course_instruction == $completed_instruction) {
                            $progress+=1;
                        }
                    }
                }
                $missing = count($course->getInstructions()) - $progress;

                fputcsv($handle, array($surname,$firstname,$email,$missing),';');

            }
            fclose($handle);
        });

        $response->setStatusCode(200);

        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $filename= $course->getDescription();
        $response->headers->set('Content-Disposition', "attachment; filename=$filename.csv");

        return $response;
    }
}
