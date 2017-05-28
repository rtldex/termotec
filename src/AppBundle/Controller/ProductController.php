<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function tamplariepvcAction(Request $request)
    {
        return $this->render('AppBundle:Product:tamplariepvc.html.twig');
    }

    public function ferestreSimpleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ferestre = $em->getRepository('AppBundle:Product')->getFerestreSimple();

        return $this->render('AppBundle:Product:ferestre_simple.html.twig', array(
            'products' => $ferestre
        ));
    }

    public function ferestreDubleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ferestre = $em->getRepository('AppBundle:Product')->getFerestreDuble();

        return $this->render('AppBundle:Product:ferestre_duble.html.twig', array(
            'products' => $ferestre
        ));
    }

    public function usiBalconAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usiBalcon = $em->getRepository('AppBundle:Product')->getUsiBalcon();

        return $this->render('AppBundle:Product:usi_balcon.html.twig', array(
            'products' => $usiBalcon
        ));
    }

    public function usiInteriorAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usiBalcon = $em->getRepository('AppBundle:Product')->getUsiInterior();

        return $this->render('AppBundle:Product:usi_interior.html.twig', array(
            'products' => $usiBalcon
        ));
    }

    public function glafuriAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usiBalcon = $em->getRepository('AppBundle:Product')->getGlafuri();

        return $this->render('AppBundle:Product:glafuri.html.twig', array(
            'products' => $usiBalcon
        ));
    }

    public function portiGarajAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usiBalcon = $em->getRepository('AppBundle:Product')->getPortiGaraj();

        return $this->render('AppBundle:Product:porti_garaj.html.twig', array(
            'products' => $usiBalcon
        ));
    }

    public function tehnicaParasolaraAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usiBalcon = $em->getRepository('AppBundle:Product')->getTehnicaParasolara();

        return $this->render('AppBundle:Product:tehnica_parasolara.html.twig', array(
            'products' => $usiBalcon
        ));
    }
}