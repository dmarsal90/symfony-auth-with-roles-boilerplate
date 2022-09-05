<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('roles', ChoiceType::class, [
                'label' => 'Roles',
                'attr' => [
                    'multiple' => true,
                    'class' => 'form-control myselect'
                ],
                'choices'  => [
                    'usuario' => 'ROLE_USER',
                    'admin' => 'ROLE_ADMIN',
                    'superadmin' => 'ROLE_SUPER_ADMIN',
                ],
            ])
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repetir Password'),
            ))
            //covertir el array a string
            ->get('roles')
            ->addModelTransformer(
                new CallbackTransformer(
                    fn ($rolesAsArray) => count($rolesAsArray) ? $rolesAsArray[0] : null,
                    fn ($rolesAsString) => [$rolesAsString]
                )
            );
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
