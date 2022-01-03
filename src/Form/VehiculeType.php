<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('immatriculation')
            ->add('longueur')
            ->add('largeur')
            ->add('hauteur')
            ->add('poids_vide')
            ->add('empattement')
            ->add('reservoir')
            ->add('energie')
            ->add('co2')
            ->add('conso_urbaine')
            ->add('conso_mixte')
            ->add('cylindree')
            ->add('puissance_din')
            ->add('puissance_fiscal')
            ->add('transmission')
            ->add('boite_vitesse')
            ->add('nb_vitesse')
            ->add('carrosserie')
            ->add('pneumatiques')
            ->add('acheterAt')
            ->add('vendreAt')
            ->add('valeur_achat')
            ->add('marque')
            ->add('modele')
            ->add('numero_identification')
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
