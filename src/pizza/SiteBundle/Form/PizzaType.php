<?php

namespace pizza\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PizzaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text');
            ->add('description', 'text');
            ->add('price', 'integer')
            ->add('categorie', 'choice', array(
                    'choices'     => array(
                    'small'     => 'Small',
                    'medium'    => 'Medium',
                    'large'     => 'large',
            ),
            'placeholder' => 'Kies uw type pizza',
            'multiple'  => true,
            ));
            ->add('save', 'submit');
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pizza\SiteBundle\Entity\Pizza'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pizza_sitebundle_pizza';
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return 'pizza_sitebundle_pizza';
    }
}
