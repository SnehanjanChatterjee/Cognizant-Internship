<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone_no')
            ->add('password', PasswordType::class)
            ->add('dob', DateType::class, [
                'widget' => 'single_text',
                'input'  => 'string',
                'format' => 'yyyy-MM-dd',
                // 'choice_translation_domain' => true,
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => 0,
                    'Female' => 1
                ],
                'multiple' => false,
                'expanded' => true
            ])
            ->add('interest', CheckboxType::class, [
                'label'    => 'Interested in books?',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
