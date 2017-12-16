<?php

namespace AppBundle\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EditProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->remove('current_password')
            ->add('nom', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom'
            ))
            ->add('email', TextType::class, array(
                'label' => 'email'
            ));

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()

    {
        return 'fos_user_profile_edit';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }


}
