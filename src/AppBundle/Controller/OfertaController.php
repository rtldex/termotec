<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OfertaController extends Controller
{
    public function cerereAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('AppBundle:Oferta:formular_cerere.html.twig');
        } else {
            return $this->render('AppBundle:Oferta:cerere.html.twig');
        }
    }
}