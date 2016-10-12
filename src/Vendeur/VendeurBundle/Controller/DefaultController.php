<?php

namespace Vendeur\VendeurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VendeurBundle:Default:index.html.twig', array('name' => $name));
    }
}
