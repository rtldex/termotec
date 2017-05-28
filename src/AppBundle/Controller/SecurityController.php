<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle:security:login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);
        $error = '';

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            if ($em->getRepository('AppBundle:User')->findOneBy(array('email' => $user->getEmail()))) {
                $error = 'Acest email este deja folosit';
            } else {
                $plainPassword = $user->getPassword();
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $plainPassword);
                $user->setPassword($encoded);

                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('register_success');
            }
        }

        return $this->render('AppBundle:security:register.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
            'error' => $error
        ));
    }

    /**
     * @Route("/register_success", name="register_success")
     */
    public function registerSuccessAction()
    {
        return $this->render('AppBundle:security:register_success.html.twig');
    }
}