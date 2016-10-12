<?php

namespace Extranet\ExtranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Extranet\ExtranetBundle\Entity\Projets;
use Extranet\ExtranetBundle\Form\ProjetsType;



/**
 * Projets controller.
 *
 */
class ProjetsController extends Controller
{

    /**
     * Lists all Projets entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExtranetBundle:Projets')->findAll();
        $files = array();
        foreach($entities as $post)
        {
            $dossier = './assets/Projets/'.$this->formatText($post->getNomProjet()).'/img_main/';
            $ok = scandir($dossier); $file = end($ok);
            $files[] .= $dossier.$file;

        }
        $imgfiles = $dossier.$file;
        return $this->render('ExtranetBundle:Projets:index.html.twig', array(
            'entities' => $entities,
            'files' => $files
        ));
    }




    /**
     * Creates a new Projets entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Projets();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $avatmp = $_FILES['extranet_extranetbundle_projets']['tmp_name']['dossier'];
        $avatar = $_FILES['extranet_extranetbundle_projets']['name']['dossier'];
        $directory = $this->get('kernel')->getRootDir() . '/../web' . $this->get('request')->getBasePath() . '/'.$this->formatText($entity->getnomProjet()).'/';
        $dossier = './assets/Projets/'.$this->formatText($entity->getnomProjet()).'/img_main/';
        $filename = $this->formatText($entity->getnomProjet());


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            if($avatmp){
                $this->upload_rename($dossier, $avatmp, $avatar, $filename);
                $ok = scandir($dossier); $file = end($ok);
                $em->getRepository('ExtranetBundle:Projets')->updateDossier($dossier.'/'.$file,$entity->getId());
            }

            return $this->redirect($this->generateUrl('projets_show', array('id' => $entity->getId())));
        }

        return $this->render('ExtranetBundle:Projets:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Projets entity.
     *
     * @param Projets $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Projets $entity)
    {
        $form = $this->createForm(new ProjetsType(), $entity, array(
            'action' => $this->generateUrl('projets_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer un nouveau projet','attr' =>  array('class' => 'btn btn-green')));

        return $form;
    }

    /**
     * Displays a form to create a new Projets entity.
     *
     */
    public function newAction()
    {
        $entity = new Projets();
        $form = $this->createCreateForm($entity);

        return $this->render('ExtranetBundle:Projets:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Projets entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ExtranetBundle:Projets')->find($id);
        $tachesbyprojet = $em->getrepository('ExtranetBundle:Taches')->findBy(array('projets_id' => $id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projets entity.');
        }
        if (!$tachesbyprojet) {
            //throw $this->createNotFoundException('Aucune taches ratachées à ce projet');
            $this->get('session')->getFlashBag()->add('success', 'Aucune taches ratachées à ce projet');
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExtranetBundle:Projets:show.html.twig', array(
            'entity' => $entity,
            'tachebyprojet' => $tachesbyprojet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Projets entity.
     *
     */
    public function editAction($id)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Projets')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Projets entity.');
            }

            $editForm = $this->createEditForm($entity);
            $deleteForm = $this->createDeleteForm($id);

            return $this->render('ExtranetBundle:Projets:edit.html.twig', array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView()
            ));

        } else {
            return $this->redirect($this->generateUrl('projets'));
        }
    }

    /**
     * Creates a form to edit a Projets entity.
     *
     * @param Projets $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Projets $entity)
    {
        $form = $this->createForm(new ProjetsType(), $entity, array(
            'action' => $this->generateUrl('projets_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour', 'attr' => array('class' => 'btn btn-red')));

        return $form;
    }

    /**
     * Edits an existing Projets entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ExtranetBundle:Projets')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projets entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ExtranetBundle:Projets')->find($id);

        $avatmp = $_FILES['extranet_extranetbundle_projets']['tmp_name']['dossier'];
        $avatar = $_FILES['extranet_extranetbundle_projets']['name']['dossier'];

        $dossier = './assets/Projets/'.$this->formatText($entity->getnomProjet()).'/img_main/';
        $filename = $this->formatText($entity->getnomProjet());

        if ($editForm->isValid()) {
            $em->flush();
            if($avatmp){

                $this->upload_rename($dossier, $avatmp, $avatar, $filename);
                $ok = scandir($dossier); $file = end($ok);
                $em->getRepository('ExtranetBundle:Projets')->updateDossier($dossier.'/'.$file,$entity->getId());
            }
            //return $this->redirect($this->generateUrl('projets_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('projets_show', array('id' => $id)));

        }

        return $this->render('ExtranetBundle:Projets:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Projets entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExtranetBundle:Projets')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Projets entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('projets'));
    }

    /**
     * Creates a form to delete a Projets entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projets_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer projet',
                                            'attr'   =>  array('class'   => 'btn btn-red')
            ))
            ->getForm();
    }

    private function getDistinctValue($data){
        $tab = array();
        foreach($data as $key => $val){
            $tab[] .= $val;
        }
        return array_unique($tab);
    }

    private function formatText($titreprojet)
    {
        if (!empty($titreprojet)) {
            // MAJUSCULE
            $sIn = mb_strtoupper($titreprojet, "UTF-8");

            // SUPPRIME LES ACCENTS
            $sIn = str_replace(Array('Â', 'Ä', 'À', 'Ç', 'È', 'É', 'Ê', 'Ë', 'ŒÎ', 'Ï', 'Ô', 'Ö', 'Ù', 'Û', 'Ü'," "),
                Array('A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'O', 'O', 'U', 'U', 'U',""), $sIn);

            // SUPPRIME TOUT CE QUI N'EST PAS UNE LETTRE OU UN TIRRET
            $sIn = preg_replace('`[^A-Z[:space:]\'0-9-]`', '', $sIn);

            // REMPLACE LES ESPACE
            $sIn = preg_replace('`[[:space:]\']{1,}`', '-', trim($sIn));

            // SUPPRIME LETTRES REPETES
            $sIn = preg_replace('`(.)\1`', '$1', $sIn);

            // TEST SUR TIRET EN FIN DE CHAINE
            if ($sIn{strlen($sIn) - 1} == "-") $sIn = substr($sIn, 0, strlen($sIn) - 1);
            // MINUSCULE
            $sIn = strtolower($sIn);

            // SORTIE
            return $sIn;
        }
    }

    public function upload_rename($directory, $avatmp, $avatar, $name)
    {
        $taille_maxi = 2097152;
        $taille = filesize($avatmp);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($avatar, '.');
        $fichier = basename($avatar);
        $fichier = $name.$extension;

        if(!in_array($extension, $extensions)) {
            return $erreur = 'file extension accepted png, jpg, jpeg, ';
        }

        if($taille>$taille_maxi){
            //return false;
            return $erreur = 'the file is too large...';
        }

        if(!isset($erreur)) {
            //S'il n'y a pas d'erreur, on upload
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
            );

            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if (!file_exists($directory)) {
                mkdir($directory, 0700,true);
            }else{
                echo "non";exit();
            }
            // if (!mkdir($directory, 755, true)) {
            //     die('Echec lors de la création des répertoires...');
            // }

            if(move_uploaded_file($avatmp, $directory . $fichier)) {
                return 'Upload success !';
            }else{
                return 'upload failed !';
            }

        }else{
            return false;
        }
    }

}
