<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    protected $ownerinstructions;
    protected $moderatorinstructions;
    protected $userinstructions;

    public function indexAction()
    {
        $this->getOwnInstructions(1);

        return $this->render('HSDOnSecBundle:Dashboard:index.html.twig', array(
            'moderatorcourses' => $this->getCoursesByUserId(1),
            //ToDo bitte dynamische UserId eintragen
            'ownerinstructions' => $this->ownerinstructions,
            'moderatorinstructions' => $this->moderatorinstructions,
            'userinstructions' => $this->userinstructions,
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
}
