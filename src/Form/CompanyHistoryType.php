<?php

namespace App\Form;

use App\Entity\CompanyHistory;
use App\Entity\LegalForm;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('siren')
            ->add('registrationCity')
            ->add('registrationDate')
            ->add('capital')
            ->add('streetNumber1')
            ->add('wayType1')
            ->add('wayName1')
            ->add('city1')
            ->add('postCode1')
            ->add('streetNumber2')
            ->add('wayType2')
            ->add('wayName2')
            ->add('city2')
            ->add('postCode2')
            ->add('streetNumber3')
            ->add('waytype3')
            ->add('wayName3')
            ->add('city3')
            ->add('postCode3')
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
            'data_class' => CompanyHistory::class,
        ]);
    }
}
