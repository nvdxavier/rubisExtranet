<?php

namespace AppBundle\Controller;

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
        return $this->redirect("projets");

        // replace this example code with whatever you need
       // return $this->render('default/index.html.twig', array(
       //     'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
       // ));
    }


}