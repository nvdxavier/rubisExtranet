<?php

namespace Extranet\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TachesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tache')
            ->add('descriptionTache','textarea')
            ->add('duree')
            ->add('debut')
            ->add('fin')
            ->add('statutTache','choice', array(
                'choices' => array( 'Non-actif' => 'Non-actif',
                    'En cours' => 'En cours',
                    'Presque fini' => 'Presque fini',
                    'Terminé' => 'Terminé'
                )))
            ->add('priorite','choice', array(
                'choices' => array( '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4'
                )))
            ->add('compteutilisateur')
            ->add('projets')


        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Extranet\ExtranetBundle\Entity\Taches'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_extranetbundle_taches';
    }
}
