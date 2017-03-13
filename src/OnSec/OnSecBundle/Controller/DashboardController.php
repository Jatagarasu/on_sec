<?php

namespace OnSec\OnSecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('HSDOnSecBundle:Dashboard:index.html.twig', array(
            // ...
        ));
    }

}
