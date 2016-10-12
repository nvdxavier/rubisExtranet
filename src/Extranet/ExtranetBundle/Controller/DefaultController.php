<?php

namespace Extranet\ExtranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Extranet\ExtranetBundle\Form\RechercheType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        //return $this->render('ExtranetBundle:Default:index.html.twig', array('name' => $name));
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExtranetBundle:Projets')->findAll();

        return $this->render('ExtranetBundle:Projets:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function rechercheAction()
    {
        $form = $this->createForm(new RechercheType());
        return $this->render('ExtranetBundle:Default:Recherche/modulesUsed/recherche.html.twig', array('form' => $form->createView()));
    }

    public function rechercheTraitementAction()
    {
        $form = $this->createForm(new RechercheType());

        if ($this->get('request')->getMethod() == 'POST') {
            $form->handleRequest($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $recherche = $em->getRepository('ExtranetBundle:Taches')->recherche($form['recherche']->getData());

            if (empty($recherche)) {
                $recherche = $em->getRepository('ExtranetBundle:Projets')->recherche($form['recherche']->getData());
                // if(empty($recherche)){
                //     $recherche = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->recherche($form['recherche']->getData());
                // }
            }

            return $this->render('ExtranetBundle:Default:resultatrecherche.html.twig', array('recherche' => $recherche));

        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

    }

}
