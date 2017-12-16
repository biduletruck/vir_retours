<?php

namespace AppBundle\Form\GestionRetour;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DsaGestionRetourType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDemandeDsa',DateType::class,  array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ))
            ->add('dateReponseDemandeDsa',DateType::class,  array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ))
            ->add('numeroRaq')
            ->add('dateReceptionBonReprise',DateType::class,  array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ))
            ->add('commentaire')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GestionRetour'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_dsagestionretour';
    }


}
