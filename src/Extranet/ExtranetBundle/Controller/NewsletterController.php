<?php

namespace Extranet\ExtranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Extranet\ExtranetBundle\Entity\Newsletters;
use Extranet\ExtranetBundle\Form\NewsletterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class NewsletterController extends controller
{

    /**
     * Lists all Projets entities.
     *
     */
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('ExtranetBundle:Newsletters')->findAll();

            return $this->render('ExtranetBundle:Default:Newsletter/index.html.twig', array(
                'entities' => $entities,
            ));
        }else{
            return $this->redirect($this->generateUrl('projets'));
        }
    }


  //  /**
  //   * create a User entity.
  //   *
  //   * @Security("has_role('ROLE_ADMIN')")
  //   */
    public function newAction()
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Vous ne possédez pas les droits suffisants pour accéder à la page!');
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {

            $entity = new Newsletters();
            $form = $this->createCreateForm($entity);

            return $this->render('ExtranetBundle:Default:Newsletter/new.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ));

        } else {
            $entity = new Newsletters();
            return $this->redirect($this->generateUrl('newsletter'));
        }
    }


    /**
     * Displays a form to create a new Taches entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Newsletters();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $entity->setDateCreationNewsletter(new \DateTime());
            $entity->setDateEnvois(null);
            $entity->setDateMiseAJour(new \DateTime());
            $entity->setStatus(1);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('newsletter_show', array('id' => $entity->getId())));
        }
        return $this->render('ExtranetBundle:Default:Newsletter/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NewsletterType entity.
     *
     * @param NewsletterType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Newsletters $entity)
    {
        $form = $this->createForm(new NewsletterType(), $entity, array(
            'action' => $this->generateUrl('newsletter_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer la newsletter'));

        return $form;
    }



    /**
     * Finds and displays a Newsletter entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ExtranetBundle:Newsletters')->find($id);
        $array = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->findUserMailbyrole("ROLE_ADMIN");


        //dump($array);exit();
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom(array('nvdxavier@gmail.com' => "gorgoroth"))
            ->setTo('nvdxavier@gmail.com')
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody(
                $entity->getForm().'<br>'
            );
        //$this->get('mailer')->send($message);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Newsletter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $sendnewsletter = $this->sendNewsletterForm($id);
        return $this->render('ExtranetBundle:Default:Newsletter/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'send_newsletter' => $sendnewsletter->createView(),
        ));
    }


    /**
     * Creates a form to delete a Newsletter entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }



    private function combineArray(array $key, array $val)
    {
        $arrayKey = $key;
        $arrayVal = $val;

        $final_array = array_combine($arrayKey, $arrayVal);
        return $final_array;
    }

    /**
     * Creates a form to send a Newsletter entity by id and by role.
     * @param mixed $id The entity id
     * @return \Symfony\Component\Form\Form The form
     */
    private function sendNewsletterForm($id)
    {
        $originalRoles = $this->container->getParameter('security.role_hierarchy.roles');
        $em = $this->getDoctrine()->getManager();
        $listrole = $this->combineArray(array_keys($originalRoles), array_keys($originalRoles));

        if (isset($_POST['form']['roles']) && !empty($_POST['form']['roles']))
        {
            $rolesselected = $_POST['form']['roles'];
            foreach ($rolesselected as $roles)
            {
                $emailbyrole = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->findUserMailbyrole($roles);
                if (!empty($emailbyrole[0]['emailCanonical'])) {
                    $this->sendAction($emailbyrole[0]['emailCanonical'], $id);
                }
            }

        }

        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_sendMail', array('id' => $id)))
            ->setMethod('POST')
            ->add('roles', 'choice', array(
                'choices' => $listrole,
                'required' => false, 'label' => 'Roles', 'multiple' => true,
                'choices_as_values' => true
            ))
            ->add('submit', 'submit', array('label' => 'envoie newsletter'))
            ->getForm();
    }


    /**
     * Deletes a Newsletter entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Newsletters')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Newsletter entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newsletter'));
    }


    /**
     * Edits an existing Newsletter entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Newsletters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Newsletters entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_show', array('id' => $id)));
        }

        return $this->render('ExtranetBundle:Default:Newsletter/edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Newsletter entity.
     *
     * @param Newsletter $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Newsletters $entity)
    {
        $form = $this->createForm(new NewsletterType(), $entity, array(
            'action' => $this->generateUrl('newsletter_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Displays a form to edit an existing Newsletter entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Newsletters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Newsletter entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExtranetBundle:Default:Newsletter/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function sendAction($email, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ExtranetBundle:Newsletters')->find($id);

            $message = \Swift_Message::newInstance()
                ->setSubject( $entity->getSujet())
                ->setFrom(array('nvdxavier@gmail.com' => "Administration Rubis"))
                ->setTo($email)
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody(
                    $entity->getForm().'<br>'
                );
            $this->get('mailer')->send($message);

    }



} 