<?php

namespace pizza\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BestelbonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aantal', 'integer', array('label' => 'false'))
            ->add('itempizza')
            ->add('categorieId', new CategorieType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pizza\SiteBundle\Entity\Bestelbon'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pizza_sitebundle_bestelbon';
    }
}
