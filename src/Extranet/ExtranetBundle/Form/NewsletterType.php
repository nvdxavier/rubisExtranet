<?php
/**
 * Created by PhpStorm.
 * User: subtonix
 * Date: 09/08/2016
 * Time: 02:10
 */

namespace Extranet\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsletterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('sujet')
            ->add('form',null, array('attr' => array('class' => 'ckeditor')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Extranet\ExtranetBundle\Entity\Newsletters'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_extranetbundle_newsletter';
    }
} 