<?php

namespace Extranet\ExtranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Extranet\ExtranetBundle\Entity\Taches;
use Extranet\ExtranetBundle\Form\TachesType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;


/**
 * Taches controller.
 *
 */
class TachesController extends Controller
{

    /**
     * Lists all Taches entities.
     *
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        // the above is a shortcut for this
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ExtranetBundle:Taches')->findAll();

        return $this->render('ExtranetBundle:Taches:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Taches entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Taches();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('taches_show', array('id' => $entity->getId())));
        }

        return $this->render('ExtranetBundle:Taches:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * show all taches list by user
     *
     */
    public function gettachebyuserAction()
    {
        $user = $this->getUser();

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');

        } else {

            $em = $this->getDoctrine()->getManager();
            $deleteForm = $this->createDeleteForm($user->getId());
            $tachesbyuser = $em->getRepository('ExtranetBundle:Taches')->findBy(array('compteutilisateur' => array($user->getId(),)));

            if (!$tachesbyuser) {

                throw $this->createNotFoundException('Unable to find Taches entity.');

            } else {

                return $this->render('ExtranetBundle:Taches:tachesusers.html.twig', array(
                    'tachesbyuser' => $tachesbyuser,
                    'delete_form' => $deleteForm->createView(),
                ));
            }
        }
    }

    /**
     * Creates a form to create a Taches entity.
     *
     * @param Taches $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Taches $entity)
    {
        $form = $this->createForm(new TachesType(), $entity, array(
            'action' => $this->generateUrl('taches_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Taches entity.
     *
     */
    public function newAction()
    {
        $entity = new Taches();
        $form = $this->createCreateForm($entity);

        return $this->render('ExtranetBundle:Taches:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Taches entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Taches')->find($id);
        $nomprojet = $em->getRepository('ExtranetBundle:Projets')->findBy(array('id' => $entity->getProjetsid()));
        $tachesbyprojet = $em->getrepository('CompteUtilisateurBundle:CompteUtilisateur')->findBy(array('id' => $entity->getCompteutilisateur()));


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taches entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExtranetBundle:Taches:show.html.twig', array(
            'entity' => $entity,
            'projet' => $nomprojet,
            'tachebyprojet' => $tachesbyprojet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Taches entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Taches')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taches entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExtranetBundle:Taches:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Taches entity.
     *
     * @param Taches $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Taches $entity)
    {
        $form = $this->createForm(new TachesType(), $entity, array(
            'action' => $this->generateUrl('taches_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Taches entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExtranetBundle:Taches')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taches entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('taches_show', array('id' => $id)));
        }

        return $this->render('ExtranetBundle:Taches:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Taches entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Taches')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Taches entity.');
            }
            $em->getRepository('ExtranetBundle:Taches')->deleteTache($id);
            //$em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('taches'));
    }

    /**
     * Creates a form to delete a Taches entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('taches_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer la tache',
                                            'attr'   =>  array('class' => 'btn btn-red'))
            )
            ->getForm();
    }
}
