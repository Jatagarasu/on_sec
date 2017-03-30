<?php

namespace OnSec\OnSecBundle\Controller;

use OnSec\OnSecBundle\Entity\User;
use OnSec\OnSecBundle\Form\RegisterUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if (FALSE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $user = new User;
            $registerForm = $this->createForm(RegisterUserType::class, $user);

            $registerForm->handleRequest($request);
            if ($registerForm->isSubmitted() && $registerForm->isValid()) {

                $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('index');
            }

            //things for login functionality
            $authenticationUtils = $this->get('security.authentication_utils');
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('HSDOnSecBundle:Default:index.html.twig', array(
                'last_username' => $lastUsername,
                'error' => $error,
                'registerForm' => $registerForm->createView(),
            ));
        }
        else
            return $this->redirectToRoute('index');
    }
}
