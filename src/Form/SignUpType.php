<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class SignUpType
 * @package App\Form
 */
class SignUpType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Inserisci la tua email',
                ]
            ])
            ->add('username', TextType::class, [
                'label' => 'Password',
                'attr' => [
                    'placeholder' => 'Inserisci la tua password',
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'Password',
                    'attr' => [
                        'placeholder' => 'Inserisci password',
                    ]
                ],
                'second_options' => [
                    'label' => 'Ripeti Password',
                    'attr' => [
                        'placeholder' => 'Inserisci la tua email',
                    ]
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Il campo è obbligatorio']),
                    new Length(['max' => 4096])
                ]
            ])
            ->add('register', SubmitType::class, [
                'label' => 'Registrati'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}