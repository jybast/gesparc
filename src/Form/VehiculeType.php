<?php

namespace App\Form;

use App\Entity\Vehicule;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('immatriculation', TextType::class, [
                'label' => 'Immatriculation',
                'required' => true
            ])
            ->add('longueur', NumberType::class, [
                'label' => 'Consommation mixte',
                'scale' => 2
            ])
            ->add('largeur', NumberType::class, [
                'label' => 'Consommation mixte',
                'scale' => 2
            ])
            ->add('hauteur', NumberType::class, [
                'label' => 'Consommation mixte',
                'scale' => 2
            ])
            ->add('poids_vide', IntegerType::class, [
                'label' => 'Poids à vide'
            ])
            ->add('empattement', IntegerType::class, [
                'label' => 'Empattement'
            ])
            ->add('reservoir', IntegerType::class, [
                'label' => 'Capacité du réservoir'
            ])
            ->add('energie', TextType::class, [
                'label' => 'Energie'
            ])
            ->add('co2', IntegerType::class, [
                'label' => 'Emission CO2'
            ])
            ->add('conso_urbaine', NumberType::class, [
                'label' => 'Consommation mixte',
                'scale' => 2
            ])
            ->add('conso_mixte', NumberType::class, [
                'label' => 'Consommation mixte',
                'scale' => 2
            ])
            ->add('cylindree', IntegerType::class, [
                'label' => 'Cylindrée'
            ])
            ->add('puissance_din', IntegerType::class, [
                'label' => 'Puissance'
            ])
            ->add('puissance_fiscal', IntegerType::class, [
                'label' => 'Puissance fiscale'
            ])
            ->add('transmission', TextType::class, [
                'label' => 'Transmission'
            ])
            ->add('boite_vitesse', TextType::class, [
                'label' => 'Type de boîte de vitesse'
            ])
            ->add('nb_vitesse', IntegerType::class, [
                'label' => 'Nombre de vitesses'
            ])
            ->add('carrosserie', TextType::class, [
                'label' => 'Carrosserie'
            ])
            ->add('pneumatiques', TextType::class, [
                'label' => 'Pneumatiques'
            ])
            ->add('acheterAt', DateType::class, [
                'label' => 'Date d\'acquisition',
                'widget' => 'choice',
                'years' => range(date('Y') - 15, date('Y') + 10),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
            ])
            ->add('vendreAt', DateType::class, [
                'label' => 'Date de vente',
                'widget' => 'choice',
                'years' => range(date('Y') - 10, date('Y') + 10),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
            ])
            ->add('valeur_achat', MoneyType::class, [
                'label' => 'Valeur d\achat',
                'scale' => 2

            ])
            ->add('marque', TextType::class, [
                'label' => 'Marque'
            ])
            ->add('modele', TextType::class, [
                'label' => 'Modèle'
            ])
            ->add('numero_identification', TextType::class, [
                'label' => 'Numéro d\'identification VIN'
            ])
            ->add('certificatPdf', FileType::class, [
                'label' => 'Certificat d\'immatriculation',
                'mapped' => false,
                'required' => false
            ])
            ->add('assurancePdf', FileType::class, [
                'label' => 'Certificat d\'assurance',
                'mapped' => false,
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
