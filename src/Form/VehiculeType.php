<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Validator\Constraints\File;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('immatriculation', TextType::class, [
                'label' => 'Numéro d\'immatriculation'
            ])
            ->add('immatriculationAt', DateType::class, [
                'label' => 'Date 1ère mise en circulation',
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 15, date('Y') + 10),
            ])
            ->add('titulaire1', TextType::class, [
                'label' => 'Nom et prénom du titulaire'
            ])
            ->add('titulaire2', TextType::class, [
                'label' => 'Nom et prénom du co-titulaire'
            ])
            ->add('titulaire_adresse', TextType::class, [
                'label' => 'Adresse du titulaire'
            ])
            ->add('marque', TextType::class, [
                'label' => 'Marque'
            ])
            ->add('version', TextType::class, [
                'label' => 'Version ou modèle'
            ])
            ->add('d21_codecni', TextType::class, [
                'label' => 'Code national d\'identification'
            ])
            ->add('d3_commerial', TextType::class, [
                'label' => 'Dénommination commerciale'
            ])
            ->add('numero_VIN', TextType::class, [
                'label' => 'Code VIN'
            ])
            ->add('f1_ptac', IntegerType::class, [
                'label' => 'Masse autorisée'
            ])
            ->add('f3_ptra', IntegerType::class, [
                'label' => 'Poids total roulant'
            ])
            ->add('g1_poidsvide', IntegerType::class, [
                'label' => 'Masse à vide'
            ])
            ->add('i_certificatAt', DateType::class, [
                'label' => 'Date du certificat',
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 15, date('Y') + 10),
            ])
            ->add('j1_genre', TextType::class, [
                'label' => 'Genre'
            ])
            ->add('j2_carrosserie', TextType::class, [
                'label' => 'Type CE'
            ])
            ->add('j3_nat', TextType::class, [
                'label' => 'Type Nat'
            ])
            ->add('k_reception', TextType::class, [
                'label' => 'Réception'
            ])
            ->add('p1_cylindree', IntegerType::class, [
                'label' => 'Cylindrée'
            ])
            ->add('p2_kw', IntegerType::class, [
                'label' => 'Puissance KW'
            ])
            ->add('p3_energie', TextType::class, [
                'label' => 'Energie'
            ])
            ->add('p6_cv', IntegerType::class, [
                'label' => 'Puissance CV'
            ])
            ->add('s1_assis', IntegerType::class, [
                'label' => 'Places assises'
            ])
            ->add('s2_debout', IntegerType::class, [
                'label' => 'Places debout'
            ])
            ->add('u1_db', IntegerType::class, [
                'label' => 'Volume DB'
            ])
            ->add('u2_moteur', IntegerType::class, [
                'label' => 'Vitesse moteur'
            ])
            ->add('v7_co2', IntegerType::class, [
                'label' => 'Emission CO2'
            ])
            ->add('v9_cee', TextType::class, [
                'label' => 'Norme CEE'
            ])
            ->add('controleAt', DateType::class, [
                'label' => 'Date prochain contrôle',
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 10, date('Y') + 10),
            ])
            ->add('longueur', NumberType::class, [
                'label' => 'Longueur',
                'scale' => 2,
                'required' => false
            ])
            ->add('largeur', NumberType::class, [
                'label' => 'Largeur',
                'scale' => 2,
                'required' => false
            ])
            ->add('hauteur', NumberType::class, [
                'label' => 'Hauteur',
                'scale' => 2,
                'required' => false
            ])
            ->add('transmission', TextType::class, [
                'label' => 'Transmission'
            ])
            ->add('boite', TextType::class, [
                'label' => 'Type de boîte'
            ])
            ->add('nbvitesse', IntegerType::class, [
                'label' => 'Nombre de vitesses'
            ])
            ->add('couleur', TextType::class, [
                'label' => 'Couleur'
            ])
            ->add('reservoir', IntegerType::class, [
                'label' => 'Capacité'
            ])
            ->add('conso_urbaine', NumberType::class, [
                'label' => 'Consommation urbaine',
                'scale' => 2,
                'required' => false
            ])
            ->add('conso_mixte', NumberType::class, [
                'label' => 'Consommation moyenne',
                'scale' => 2,
                'required' => false
            ])
            ->add('achatAt', DateType::class, [
                'label' => 'Date d\'achat',
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 15, date('Y') + 10),
            ])
            ->add('venteAt', DateType::class, [
                'label' => 'Date de revente',
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 10, date('Y') + 10),
                'required' => false
            ])
            ->add('valeur', NumberType::class, [
                'label' => 'Valeur à l\'achat',
                'scale' => 2,
                'required' => false
            ])
            ->add('pneumatiques', TextType::class, [
                'label' => 'Pneumatiques',
                'required' => false
            ])

            ->add('galeries', FileType::class, [
                'label' => 'Images à télécharger',
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'constraints' => [
                    new File([

                        'mimeTypes' => ['image/jpeg', 'image/png'],
                    ])
                ]
            ])
            ->add('documents', FileType::class, [
                'label' => 'documents à télécharger',
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'constraints' => [
                    new File([

                        'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                        'mimeTypesMessage' => 'Veuillez utiliser un fichier PDF valide.'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
