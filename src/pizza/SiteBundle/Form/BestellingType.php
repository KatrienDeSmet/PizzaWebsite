<?php

namespace pizza\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BestellingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('totaal', 'integer')
            ->add('bestelbonId', new BestelbonType())
            ->add('kortingId', new KortingType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pizza\SiteBundle\Entity\Bestelling'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pizza_sitebundle_bestelling';
    }
}
