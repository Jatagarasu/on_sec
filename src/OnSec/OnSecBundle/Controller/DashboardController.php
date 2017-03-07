<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $usercourses = $this->getCoursesByUserId(1);
        //ToDo bitte dynamische UserId eintragen

        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        return $this->render('HSDOnSecBundle:Dashboard:index.html.twig', array(
            'courses' => $courses,
            'usercourses' => $usercourses,
        ));
    }

    public function getCoursesByUserId($userId)
    {
        $usercourses = array();
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('HSDOnSecBundle:Course')->findAll();

        foreach ($courses as $course)
        {
            foreach ($course->getSubscriber() as $subscriber)
            {
                if($subscriber->getId() == $userId->getId())
                    array_push($usercourses, $course);
            }
        }
    }

}
