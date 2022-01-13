<?php

namespace App\Form;

use App\Entity\Vehicule;
use App\Entity\Assurance;
use App\Form\VehiculeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AssuranceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('compagnie', TextType::class, [
                'label' => 'Société d\'assurance'
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'E-mail'
            ])
            ->add('debutAt', DateType::class, [
                'label' => 'A compter du'
            ])
            ->add('finAt', DateType::class, [
                'label' => 'Jusqu\'au'
            ])
            ->add('montant', MoneyType::class, [
                'label' => 'montant ',
                'currency' => 'EUR'
            ])
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Assurance::class,
        ]);
    }
}
