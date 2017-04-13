<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\Subscriber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    protected $ownerinstructions;
    protected $moderatorinstructions;
    protected $userinstructions;

    public function indexAction()
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $UserId = $this->get('security.token_storage')->getToken()->getUser()->getId();

            $session_param = $this->get('session')->get('coursename');
            if(isset($session_param) && !empty($session_param))
            {
                $this->get('session')->set('coursename','');
            }

            $this->getOwnInstructions($UserId);

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('HSDOnSecBundle:User')->find($UserId);

            $this->updatecurrentSubscribtions($UserId);

            return $this->render('HSDOnSecBundle:Dashboard:index.html.twig', array(
                'moderatorcourses' => $this->getCoursesByUserId($UserId),
                'ownerinstructions' => $this->ownerinstructions,
                'moderatorinstructions' => $this->moderatorinstructions,
                'userinstructions' => $this->userinstructions,
                'subscribercourses' => $this->getsubscribedCourses($UserId),
                'user' => $user,
                'successSubscribedCourse' => $session_param,
            ));
        }
        else {
            return $this->redirectToRoute('login');
        }
    }


    public function semesterFilterAction(Request $request) {
        $semester = trim(strip_tags($request->get('semester')));
        $courseId = trim(strip_tags($request->get('courseId')));

        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('HSDOnSecBundle:Course')->find($courseId);

        $semester_array = $this->filterSemester($course);

        return new Response(json_encode($semester_array[$semester]));
    }

    private function filterSemester($course) {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('HSDOnSecBundle:Course')->find($course);
        $subscribers = $course->getSubscribers();
        $semester_array = array();

        foreach ($subscribers as $subscriber) {
            if(($subscriber->getSubscribtionDate()->format('m')>2 && $subscriber->getSubscribtionDate()->format('m')<9)) {
                $semester = "SS ".$subscriber->getSubscribtionDate()->format('Y');

                if (isset($semester_array[$semester])) {
                    array_push($semester_array[$semester], $subscriber);
                }
                else {
                    $semester_array[$semester] = array ();
                    array_push($semester_array[$semester], $subscriber);
                }
            }
            else if($subscriber->getSubscribtionDate()->format('m')>8 && $subscriber->getSubscribtionDate()->format('m')<13)
            {
                $thisyear = $subscriber->getSubscribtionDate()->format('Y');
                $nextyear = $subscriber->getSubscribtionDate()->modify('+1 year')->format('Y');
                $semester = "WS " . $thisyear . "/" . $nextyear;

                if (isset($semester_array[$semester])) {
                    array_push($semester_array[$semester], $subscriber);
                }
                else {
                    $semester_array[$semester] = array ();
                    array_push($semester_array[$semester], $subscriber);
                }
            }
            else
            {
                $thisyear = $subscriber->getSubscribtionDate()->format('Y');
                $lastyear = $subscriber->getSubscribtionDate()->modify('-1 year')->format('Y');
                $semester = "WS " . $lastyear . "/" . $thisyear;

                if (isset($semester_array[$semester])) {
                    array_push($semester_array[$semester], $subscriber);
                }
                else {
                    $semester_array[$semester] = array ();
                    array_push($semester_array[$semester], $subscriber);
                }
            }
        }
        return $semester_array;
    }

    public function modalAction($course)
    {
        $semester_array = $this->filterSemester($course);

        return $this->render('HSDOnSecBundle:Dashboard:modal.html.twig', array(
            'semester_array' => $semester_array,
            'course' => $course
        ));
    }

    public function searchAction(Request $request)
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

            $subscribedCourses = array();

            $term = trim(strip_tags($request->get('term')));

            $em = $this->getDoctrine()->getManager();

            $foundCourses = $em->getRepository('HSDOnSecBundle:Course')->search($term);

            foreach ($foundCourses as $course){
                $forSubscribers = $course->getSubscribers();
                $found = false;
                foreach($forSubscribers as $subscriber)
                {
                    if($subscriber->getUser()->getId() == $userId)
                    {
                        $found = true;
                    }
                }
                if(!$found)
                    $subscribedCourses[(string)$course->getId()] = $course->getDescription();
                    //array_push($subscribedCourses, $course->getDescription());
            }

            return new Response(json_encode($subscribedCourses));
        }
        else {
            return $this->redirectToRoute('login');
        }
    }

    public function addSubscriberAction($course_id)
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $em = $this->getDoctrine()->getManager();

            $userid = $this->get('security.token_storage')->getToken()->getUser()->getId();

            $user = $em->getRepository('HSDOnSecBundle:User')->find($userid);
            $course = $em->getRepository('HSDOnSecBundle:Course')->find($course_id);

            $subscriber = new Subscriber();
            $subscriber->subscribtionDateTime();
            $subscriber->setCourse($course);
            $subscriber->setUser($user);

            $em->persist($subscriber);
            $em->flush($subscriber);

            $user->addCourseSubscription($subscriber);

            $this->get('session')->set('coursename',$course->getDescription());
            return $this->redirectToRoute('dashboard');
        }
        else {
            return $this->redirectToRoute('login');
        }
    }

    private function getCoursesByUserId($userId)
    {
        $usercourses = array();

        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        foreach ($courses as $course)
        {
            if($course->getOwner()->getId() == $userId)
                array_push($usercourses, $course);
            else {
                foreach ($course->getModerators() as $moderator) {
                    if ($moderator->getId() == $userId)
                        array_push($usercourses, $course);
                }
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
                if($subscriber->getUser()->getId() == $userId)
                {
                    array_push($subscribedCourses, $course);
                }
            }
        }
        return $subscribedCourses;
    }

    private function updatecurrentSubscribtions($userId)
    {
        $CurrentSemesterBegin = new \DateTime();
        if($CurrentSemesterBegin->format('m')>0 && $CurrentSemesterBegin->format('m')<3)
        {
            $lastYear = $CurrentSemesterBegin;
            $lastYear->modify('-1 year');
            $CurrentSemesterBegin->setDate($lastYear->format('Y'), 9, 1);
        }
        else if($CurrentSemesterBegin->format('m')>8 && $CurrentSemesterBegin->format('m')<13)
        {
            $CurrentSemesterBegin->setDate($CurrentSemesterBegin->format('Y'), 9, 1);
        }
        else
        {
            $CurrentSemesterBegin->setDate($CurrentSemesterBegin->format('Y'), 3, 1);
        }

        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();
        $user = $em->getRepository('HSDOnSecBundle:User')->find($userId);

        foreach ($courses as $course)
        {
            $forSubscribers = $course->getSubscribers();
            foreach($forSubscribers as $subscriber)
            {
                if($subscriber->getUser()->getId() == $userId)
                {
                    if($subscriber->getSubscribtionDate()->format("Y-m-d") < $CurrentSemesterBegin->format("Y-m-d")) {
                        $em = $this->getDoctrine()->getManager();
                        $em->remove($subscriber);
                        $em->flush();
                        //$user->removeCourseSubscription($subscriber);
                    }
                }
            }
        }
    }

    public function createCSVAction($course_id)
    {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('HSDOnSecBundle:Course')->find($course_id);

        $subscribers = $course->getSubscribers();
        foreach ($subscribers as $subscriber) {
            $date = $subscriber->getSubscribtionDate();
            $year = intval (date("Y", $date));
            $month = intval (date("m", $date));


            date_default_timezone_set("Europe/Berlin");
            $timestamp = time();
            $current_year = intval (date("Y", $timestamp));
            $current_month = intval (date("m", $timestamp));

        }

        $response = new StreamedResponse();
        $response->setCallback(function() use ($course) {
            $handle = fopen('php://output', 'w+');

            // Add the header of the CSV file
            date_default_timezone_set("Europe/Berlin");
            $timestamp = time();
            $date = date("d.m.Y",$timestamp);
            $time = date("H:i",$timestamp);

            $description = $course->getDescription();
            $description = iconv("UTF-8", "WINDOWS-1252", $description);
            fputcsv($handle, array('Teilnehmer von '.$description.' am '.$date.' um '.$time.' Uhr'),';');
            fputcsv($handle, array('Name', 'Vorname', 'E-Mail', 'Fehlende Unterweisungen'),';');


            foreach ($course->getSubscribers() as $subscriber) {
                $user = $subscriber->getUser();
                $surname = $user->getSurname();
                $firstname = $user->getFirstname();
                $email = $user->getEmail();
                $progress=0;
                $missing = [];

                foreach ($course->getInstructions() as $course_instruction) {

                    $found = null;
                    foreach ($user->getCompletedInstructions() as $completed_instruction) {
                        if ($course_instruction == $completed_instruction->getInstruction()) {
                            $progress+=1;
                            $found = 1;
                        }
                    }
                    if ($found == null) {
                            array_push($missing,$course_instruction->getDescription());
                        }
                }
                //$missing = count($course->getInstructions()) - $progress;

                $firstname = iconv("UTF-8", "WINDOWS-1252", $firstname);
                $surname = iconv("UTF-8", "WINDOWS-1252", $surname);
                $missing = iconv("UTF-8", "WINDOWS-1252", implode(", ",$missing));

                fputcsv($handle, array($surname,$firstname,$email,$missing),';');
            }
            fclose($handle);
        });

        $response->setStatusCode(200);

        $response->headers->set('Content-Type', 'text/csv; charset=WINDOWS-1252');
        $filename= $course->getDescription();
        $response->headers->set('Content-Disposition', "attachment; filename=$filename.csv");

        return $response;
    }
}
