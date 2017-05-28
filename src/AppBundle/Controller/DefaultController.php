<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/servicii", name="servicii")
     */
    public function serviciiAction()
    {
        return $this->render('AppBundle:Default:servicii.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('AppBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('AppBundle:Default:contact.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/contact_success", name="contact_success")
     */
    public function contactSuccessAction()
    {
        return $this->render('AppBundle:Default:contact_success.html.twig');
    }

}
