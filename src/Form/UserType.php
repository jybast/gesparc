<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['autocomplete' => 'email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer votre email',
                    ]),
                    new Regex([
                        'pattern' => "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                        'message' => 'Le format de votre email est incorrect'
                    ])
                ],
            ])
            ->add('roles')
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => false
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => false
            ])
            ->add('address', TextType::class, [
                'label' => 'Votre adresse',
                'required' => false
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('postcode', TextType::class, [
                'label' => 'Code postal',
                'required' => false
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'invalid_message' => 'Veuillez entrer un numéro valide',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
