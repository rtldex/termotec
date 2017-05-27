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
}