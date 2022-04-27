<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class,
        [
            'label'=>'Course Name',
            'required' => true,
            'attr'=>[
                'maxlenght' => 5,
                'minlenght' => 30
            ]
        ])
        ->add('classroom', TextType::class,
        [
            'label'=>'Class Room',
            'required' => true,
            'attr'=>[
                'maxlenght' => 5,
                'minlenght' => 30
            ]
        ])
        ->add('image', TextType::class,
        [
            'label'=>'Image',
            'required' => true,
    
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
