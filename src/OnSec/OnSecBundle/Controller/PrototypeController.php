<?php

namespace OnSec\OnSecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrototypeController extends Controller {
  public function indexAction() {
    return $this->render('HSDOnSecBundle:Prototype:index.html.twig', array(
      // ...
    ));
  }

  public function dashboardAction() {
    return $this->render('HSDOnSecBundle:Prototype:dashboard.html.twig', array(
    ));
  }

  public function createLectureAction() {
    return $this->render('HSDOnSecBundle:Prototype:createLecture.html.twig', array(
    ));
  }

  public function createInstructionAction() {
    return $this->render('HSDOnSecBundle:Prototype:createInstruction.html.twig', array(
    ));
  }

  public function createQuestionsAction() {
    return $this->render('HSDOnSecBundle:Prototype:createQuestions.html.twig', array(
    ));
  }
}
