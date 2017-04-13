<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 30.03.2017
 * Time: 21:35
 */

namespace OnSec\OnSecBundle\Controller;


use OnSec\OnSecBundle\Entity\User;
use OnSec\OnSecBundle\Form\RegisterUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function registerAction(Request $request){
        $message = '';

        $user = new User;
        $registerForm = $this->createForm(RegisterUserType::class, $user);

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted() && $registerForm->isValid() && !$this->userExistsWithEmail($user)) {

            $message = 'success';

            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //return $this->redirectToRoute('register');
        }
        elseif($registerForm->isSubmitted() && $registerForm->isValid() && $this->userExistsWithEmail($user)){
            $message = 'duplicateEntry';
        }

        return $this->render('HSDOnSecBundle:Registration:register.html.twig', array('registerForm' => $registerForm->createView(), 'message' => $message));
    }


    /**
     * Checks the Database if a given user is allready existing with a given email address
     *
     * @param User $user to look for
     * @return bool wether the user exists (true) or not (false)
     */
    private function userExistsWithEmail(User $user){
        $em = $this->getDoctrine()->getManager();
        $checkUser = $em->getRepository('HSDOnSecBundle:User')->findOneBy(array('email' => $user->getEmail()));
        
        if($checkUser){
            return true;
        }
        return false;
    }
}