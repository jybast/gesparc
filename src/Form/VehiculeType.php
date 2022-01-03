<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
            ->add('modèle')
            ->add('numero_identification')
            ->add('certificatPdf', FileType::class, [
                'label' => 'Certicificat d\'immatriculation (PDF)',
                // Le champ n'est pas associé à une entité
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un document PDF valide',
                    ])
                ],
            ])
            ->add('assurancePdf', FileType::class, [
                'label' => 'Certicificat d\'assurance (PDF)',
                // // Le champ n'est pas associé à une entité
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un document PDF valide',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
