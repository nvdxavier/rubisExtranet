<?php

namespace Extranet\ExtranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Extranet\ExtranetBundle\Entity\Enquiry;
use Extranet\ExtranetBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Request;

class PageController  extends Controller
{

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        //$request = $this->getRequest();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email
                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page


                $ok = $this->container->hasParameter('extranet_extranet.emails.contact_email');
             //   if($ok){
             //       dump($this->container->getParameter('extranet_extranet.emails.contact_email'));
             //       dump($ok);exit();
             //   //var_dump($this->container->getParameter('extranet_extranet.emails.contact_email'));exit();
             //   }else{
             //       $lol = $this->container->setParameter('extranet_extranet.emails.contact_email', 'nvdxavier@gmail.com');
             //       dump($lol); echo "non";exit();
             //   }

                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('nvdxavier@gmail.com')
                    //->setTo($this->container->getParameter('extranet_extranet.emails.contact_email'))
                    ->setTo('nvdxavier@gmail.com')
                    ->setBody($this->renderView('ExtranetBundle:Default:Page/contactEmail.html.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->Add('notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirect($this->generateUrl('extranet_contact'));
            }
        }

        return $this->render('ExtranetBundle:Default:Contact/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

} 