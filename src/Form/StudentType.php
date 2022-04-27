<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
            [
                'label'=>'Student Name',
                'required' => true,
                'attr'=>[
                    'maxlenght' => 5,
                    'minlenght' => 30
                ]
            ])
            ->add('phone', TextType::class,
            [
                'label'=>'Student Phone',
                'required' => true,
                'attr'=>[
                    'maxlenght' => 5,
                    'minlenght' => 30
                ]
            ])
            ->add('course', TextType::class,
            [
                'label'=>'Student Course',
                'required' => true,
                'attr'=>[
                    'maxlenght' => 5,
                    'minlenght' => 30
                ]
            ])
            ->add('dob', DateType::class, [
                'label'=>'Published date',
                'required' => true,
                'widget' => 'single_text'
            ])
            ->add('Save', SubmitType::class)
            


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
