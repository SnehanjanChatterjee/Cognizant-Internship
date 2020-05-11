<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentTeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Enter your Name']])
            ->add('username', TextType::class, ['attr' => ['placeholder' => 'Enter your Userame']])
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'xyz@gmail.com']])
            ->add('phone_no', null, ['attr' => ['placeholder' => 'Enter your Phone Number']])
            ->add('dob', DateType::class, [
                'widget' => 'single_text',
                // 'widget' => 'choice',
                'input'  => 'string',
                'format' => 'yyyy-MM-dd',
                // 'choice_translation_domain' => true,
            ])
            ->add('gender', ChoiceType::class, [
                'required' => true,
                'choices'  => [
                    'Male' => 'Male',
                    'Female' => 'Female'
                ],
                'multiple' => false,
                // 'expanded' => true
            ])
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'required' => true,
                'empty_data' => 'ROLE_STUDENT',
                'choices' => [
                    // 'Select Role' => null,
                    'Student' => 'ROLE_STUDENT',
                    'Teacher' => 'ROLE_TEACHER'
                    // 'Admin' => 'ROLE_ADMIN',
                ]
            ])
            ->add('password', PasswordType::class, ['attr' => ['placeholder' => 'Enter your Password']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
