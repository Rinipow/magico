<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class LoginType
 * @package App\Form
 */
class LoginType extends AbstractType
{
    const EMAIL_FIELD_NAME = 'email';
    const PASSWORD_FIELD_NAME = 'password';
    const REMEMBER_ME_FIELD_NAME = 'remember_me';
    const LOGIN_FIELD_NAME = 'login';

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::EMAIL_FIELD_NAME, Type\EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Inserisci la tua email',
                ]
            ])
            ->add(self::PASSWORD_FIELD_NAME, Type\PasswordType::class, [
                'label' => 'Password',
                'attr' => [
                    'placeholder' => 'Inserisci la tua password',
                ]
            ])
            ->add(self::REMEMBER_ME_FIELD_NAME, Type\CheckboxType::class, [
                'label' => 'Ricordami'
            ])
            ->add(self::LOGIN_FIELD_NAME, Type\SubmitType::class, [
                'label' => 'Accedi'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'csrf_token_id' => 'login_auth',
        ]);
    }

}