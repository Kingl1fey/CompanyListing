<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\LegalForm;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Company1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null, ['label' => 'Dénomination sociale '])
            ->add('siren',null, ['label' => 'Siren '])
            ->add('registrationCity',null, ['label' => "Ville d'immatriculation "])
            ->add('registrationDate',null, ['label' => "Date d'immatriculation "])
            ->add('capital',null, ['label' => 'Capital '])
            ->add('streetNumber1',null, ['label' => 'Numéro de rue '])
            ->add('wayType1',null, ['label' => 'Type de voie '])
            ->add('wayName1',null, ['label' => 'Nom de la rue '])
            ->add('city1',null, ['label' => 'Ville '])
            ->add('postCode1',null, ['label' => 'Code Postal '])
            ->add('streetNumber2',null, ['label' => 'Numéro de rue '])
            ->add('wayType2',null, ['label' => 'Type de voie '])
            ->add('wayName2',null, ['label' => 'Nom de la rue '])
            ->add('city2',null, ['label' => 'Ville '])
            ->add('postCode2',null, ['label' => 'Code Postal '])
            ->add('streetNumber3',null, ['label' => 'Numéro de rue '])
            ->add('waytype3',null, ['label' => 'Type de voie '])
            ->add('wayName3',null, ['label' => 'Nom de la rue '])
            ->add('city3',null, ['label' => 'Ville '])
            ->add('postCode3',null, ['label' => 'Code Postal '])
            ->add('legalForm', EntityType::class, [
                'class' => LegalForm::class,
                'choice_label' => 'name',
                'label' => 'Forme juridique '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
