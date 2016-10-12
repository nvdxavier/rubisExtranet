<?php

namespace CompteUtilisateur\CompteUtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur;
use CompteUtilisateur\CompteUtilisateurBundle\Form\CompteUtilisateurType;

/**
 * CompteUtilisateurAdmin controller.
 *
 */
class CompteUtilisateurAdminController extends Controller
{

    /**
     * Lists all CompteUtilisateur entities.
     *
     */
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->findAll();

            return $this->render('CompteUtilisateurBundle:Administration:CompteUtilisateur/layout/index.html.twig', array(
                'entities' => $entities,
            ));

        } else {
            return $this->redirect('https://www.youtube.com/','302');
        }
    }
    /**
     * Creates a new CompteUtilisateur entity.
     *
     */
    public function createAction(Request $request)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $entity = new CompteUtilisateur();
            $form = $this->createCreateForm($entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('adminCompteUtilisateur_show', array('id' => $entity->getId())));
            }

            return $this->render('CompteUtilisateurBundle::Administration:CompteUtilisateur/layout/new.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ));
        } else {
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }
    }

    /**
     * Creates a form to create a CompteUtilisateur entity.
     *
     * @param CompteUtilisateur $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CompteUtilisateur $entity)
    {
        $form = $this->createForm(new CompteUtilisateurType($this->container->getParameter('security.role_hierarchy.roles')), $entity, array(
            'action' => $this->generateUrl('adminCompteUtilisateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CompteUtilisateur entity.
     *
     */
    public function newAction(Request $request)
    {
        $utilisateur = new CompteUtilisateur();
        $form   = $this->createCreateForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            return $this->redirectToRoute('adminCompteUtilisateur_show', array('id' => $utilisateur->getId()));
        }
        return $this->render('CompteUtilisateurBundle:Administration:CompteUtilisateur/layout/new.html.twig', array(
            'utilisateur' => $utilisateur,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CompteUtilisateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompteUtilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CompteUtilisateurBundle:Administration:CompteUtilisateur/layout/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CompteUtilisateur entity.
     *
     */
    public function editAction($id)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produits entity.');
        }


        $editForm = $this->createEditForm($user);
        $deleteForm = $this->createDeleteForm($id);

        if ($editForm->isValid()) {
            $userManager->updateUser($user);

            return $this->redirect($this->generateUrl('compteutilisateur_compteutilisateurbundle_compteutilisateur',
                array('id' => $id)));
        }

        return $this->render('CompteUtilisateurBundle:Administration:CompteUtilisateur/layout/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CompteUtilisateur entity.
    *
    * @param CompteUtilisateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CompteUtilisateur $entity)
    {
        $form = $this->createForm(new CompteUtilisateurType($this->container->getParameter('security.role_hierarchy.roles')), $entity, array(
            'action' => $this->generateUrl('adminCompteUtilisateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        
        $form->add('submit', 'submit', array('label' => 'createEditForm'));

        return $form;
    }
    /**
     * Edits an existing CompteUtilisateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompteUtilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminCompteUtilisateur_edit', array('id' => $id)));
        }

        return $this->render('CompteUtilisateurBundle:Administration:CompteUtilisateur/layout/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CompteUtilisateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CompteUtilisateurBundle:CompteUtilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CompteUtilisateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminCompteUtilisateur'));
    }

    /**
     * Creates a form to delete a CompteUtilisateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminCompteUtilisateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


}
