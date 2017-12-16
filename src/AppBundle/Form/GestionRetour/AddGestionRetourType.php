<?php

namespace AppBundle\Form;

use AppBundle\Entity\DonneurOrdre;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddGestionRetourType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('donneurOrdre', EntityType::class, array(
                'class' => 'AppBundle:DonneurOrdre',
                'choice_label' => 'nomDonneurOrdre',
                'placeholder' => 'Choisir un donneur d\'ordre'
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
            ->add('dateEntreeEntrepot',DateType::class,  array(
                'widget' => 'single_text',
                'html5' => true,
            ))

            ->add('commentaire')
        ;

        $formModifier = function (FormInterface $form, DonneurOrdre $donneurOrdre = null) {
            $magasin = null === $donneurOrdre ? array() : $donneurOrdre->getMagasins();

            $form->add('magasin', EntityType::class, array(
                'class' => 'AppBundle\Entity\Magasin',
                'placeholder' => '',
                'choices' => $magasin,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {

                $data = $event->getData();

                $formModifier($event->getForm(), $data->getDonneurOrdre());
            }
        );

        $builder->get('donneurOrdre')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {

                $donneurOrdre = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $donneurOrdre);
            }
        );
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
        return 'appbundle_addgestionretour';
    }




}