<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('motifRetour', EntityType::class, array(
                'class' => 'AppBundle:MotifRetour',
                'choice_label' => 'nomMotifRetour',
                'placeholder' => 'Motif du retour'
            ))
            ->add('dateDemandeDsa')
            ->add('dateReponseDemandeDsa')
            ->add('numeroRaq')
            ->add('dateReceptionBonReprise')
            ->add('dateEntreeEntrepot')
            ->add('dateSortieEntrepot')
            ->add('emplacement', EntityType::class, array(
                'class' => 'AppBundle:Emplacement',
                'choice_label' => 'nomEmplacement',
                'placeholder' => 'Choisir emplacement',
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
