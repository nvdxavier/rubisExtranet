<?php

namespace CompteUtilisateur\CompteUtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



class CompteUtilisateurType extends AbstractType
{
    private $roles;

    public function __construct($roles) {
        $this->roles = $roles;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
            ->add('username')
            ->add('email')
            //->add('password')
            ->add('enabled')
            ->add('roles', 'choice', array(
                'choices' => $this->flattenArray($this->roles),
                'multiple'  => true,
            ))
           //->add('submit', 'submit', array('label' => 'buildForm'))
       ;

    }


    public function getParent()
    {
        return 'fos_user_registration';
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur',
            'roles' => null,
            'userRole' => null,
        ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'compteutilisateur_compteutilisateurbundle_compteutilisateur';
    }


    private function flattenArray(array $data)
    {
        $returnData = array();

        foreach($data as $key => $value)
        {
            $tempValue = str_replace("ROLE_", '', $key);
            $tempValue = ucwords(strtolower(str_replace("_", ' ', $tempValue)));

            $returnData[$key] = $tempValue;
        }
        return $returnData;
    }
}
