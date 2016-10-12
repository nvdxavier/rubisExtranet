<?php

namespace Extranet\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjetsType extends AbstractType
{


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomProjet','text')
            ->add('descriptionProjet','textarea')
            ->add('pleinedescription',null, array('attr' => array('class' => 'ckeditor')))
            ->add('dateDebutProjet','date')
            ->add('dateFinProjet','date')
            ->add('etatduProjet','choice', array(
                'choices' => array( 'Non-actif' => 'Non-actif',
                    'En cours' => 'En cours',
                    'Presque fini' => 'Presque fini',
                    'Terminé' => 'Terminé'
                )))
            ->add('dossier','file',array("required" => false,
                                         "trim" => true,
                                         'data_class' => null
                                        )
                 )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Extranet\ExtranetBundle\Entity\Projets'
            //'data_class' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_extranetbundle_projets';
    }
}
