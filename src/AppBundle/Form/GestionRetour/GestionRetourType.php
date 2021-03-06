<?php

namespace AppBundle\Form\GestionRetour;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionRetourType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('agence', EntityType::class, array(
                'class' => 'AppBundle:Agence',
                'choice_label' => 'nomAgence',
                'placeholder' => 'Choisir une agence'
            ))
            ->add('donneurOrdre', EntityType::class, array(
                'class' => 'AppBundle:DonneurOrdre',
                'choice_label' => 'nomDonneurOrdre',
                'placeholder' => 'Choisir un DO'
            ))
            ->add('numeroSage')
            ->add('numeroDonneurOrdre')
            ->add('prestation', EntityType::class, array(
                'class' => 'AppBundle:Prestation',
                'choice_label' => 'nomPrestation',
                'placeholder' => 'Choisir une prestation'
            ))
            ->add('nomDestinataire')
            ->add('nombreColis')
            ->add('nombreSupport')
            ->add('motifRetour', EntityType::class, array(
                'class' => 'AppBundle:MotifRetour',
                'choice_label' => 'nomMotifRetour',
                'placeholder' => 'Motif du retour'
            ))
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
            ->add('dateEntreeEntrepot',DateType::class,  array(
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('dateSortieEntrepot',DateType::class,  array(
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
        return 'appbundle_gestionretour';
    }


}
