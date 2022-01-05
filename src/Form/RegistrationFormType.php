<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre E-mail',
                'constraints' => [
                    new Email([
                        'mode' => 'strict',
                        'message' => 'Le format de l\'email est incorrect'
                    ]),
                    new NotBlank([
                        'message' => 'Entrer un e-mail valide',
                    ]),
                    new Regex([
                        'pattern' => "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                        'message' => 'Le format de votre email est incorrect'
                    ])
                ]
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un mot de passe',
                    ]),
                    /*
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    */
                    new Regex([
                        'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#',
                        'message' => 'Huit caractères au moins, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial'

                    ])
                ],
            ])
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
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'required' => false
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Accord pour l\'enregistrement de vos données personnelles.',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez donner votre accord pour l\'enregistrement de vos données personnelles.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
