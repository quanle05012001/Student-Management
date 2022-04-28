<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class,
        [
            'label' => 'Name of teacher',
            'required' => true
        ])
        ->add('bod', DateType::class,
        [
            'label' => 'Birthday of teacher',
            'required' => true,
            'widget' => 'single_text'
        ])
        ->add('phone', TextType::class,
        [
            'label' => 'Phone of teacher',
            'required' => true,
            
        ])
        ->add('image', TextType::class, [
            'label' => 'Enter the teacher image',
            'required' => true,
        ])
        
        ->add('Save',SubmitType::class)
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
