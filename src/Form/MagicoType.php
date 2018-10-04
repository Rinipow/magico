<?php

namespace App\Form;


use App\Entity\Magico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MagicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Identificativo',
                'attr' => [
                    'placeholder' => 'Inserisci un identificativo',
                ]
            ])
            ->add('latitude', TextType::class, [
                'label' => 'Latitudine',
                'attr' => [
                    'placeholder' => 'Inserisci latitudine centralina',
                ]
            ])
            ->add('longitude', TextType::class, [
                'label' => 'Longitudine',
                'attr' => [
                    'placeholder' => 'Inserisci longitudine centralina',
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Longitudine',
                'attr' => [
                    'placeholder' => 'Inserisci longitudine centralina',
                ]
            ])
            ->add('add', SubmitType::class, [
                'label' => 'Inserisci centralina'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Magico::class,
        ));
    }
}