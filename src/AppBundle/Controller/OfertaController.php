<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cerere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OfertaController extends Controller
{
    public function cerereAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $cerere = new Cerere();
            $form = $this->createForm('AppBundle\Form\CerereType', $cerere);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($cerere);
                $em->flush();

                return $this->redirectToRoute('cerere_oferta_success');
            }

            return $this->render('AppBundle:Oferta:formular_cerere.html.twig', array(
                'cerere' => $cerere,
                'form' => $form->createView(),
            ));
        } else {
            return $this->render('AppBundle:Oferta:cerere.html.twig');
        }
    }

    public function successAction() {
        return $this->render('AppBundle:Oferta:cerere_success.html.twig');
    }
}