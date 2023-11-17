<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', null,[
                'attr' => [
                    'placeholder' => 'Wprowadz nazwe miasta'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Wprowadz wartosc!",
                        'groups' => ['create', 'edit']
                    ]),
                    new Length([
                        'min' => 1,
                        'max' => 50,
                        'groups' => ['create', 'edit']
                    ])
                ]
            ])
            ->add('country', ChoiceType::class, [
                'choices'=>[
                    'Poland' => 'PL',
                    'Germany' => 'DE',
                    'France' => 'FR',
                    'Spain' => 'ES',
                    'Italy' => 'IT',
                    'United Kingdom' => 'GB',
                    'United States' => 'US',
                ],
            ])
            ->add('latitude')
            ->add('longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
