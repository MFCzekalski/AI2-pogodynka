<?php

namespace App\Form;

use App\Entity\Measurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateTime')
            ->add('Celsius', null, [
                'attr' => [
                    'placeholder' => 'Enter wind direction'
                ],
                'constraints' => [
                    new Range([
                        'min' => -100,
                        'max' => 100,
                        'groups' => ['create', 'edit']
                    ])
                ]
            ])
            ->add('Humidity')
            ->add('WindSpeed')
            ->add('WindDirection', null, [
                'attr' => [
                    'placeholder' => 'Enter wind direction'
                ],
                'constraints' => [
                    new Length([
                        'min' => 1,
                        'max' => 2,
                        'groups' => ['create', 'edit']
                    ])
                ]
            ])
            ->add('Location_ID')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
