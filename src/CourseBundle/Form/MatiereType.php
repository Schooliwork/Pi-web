<?php

namespace CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatiereType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', ChoiceType::class , array('label' => 'Subject',
                'choices' => array('Mathématiques' => 'Mathématiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression écrite'=>'Expression écrite',
                    'Français'=>'Français',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Géographie'=>'Histoire et Géographie',
                    'Informatique'=>'Informatique')))
            ->add('niveau', ChoiceType::class , array('label' => 'Level',
                'choices' => array('1st Grade'=>'1st Grade',
                    '2nd Grade'=>'2nd Grade',
                    '3rd Grade'=>'3rd Grade',
                    '4th Grade'=>'4th Grade',
                    '5th Grade'=>'5th Grade',
                    '6th Grade'=>'6th Grade')))
            ->add('picture', FileType::class, array('label'=>'Course(PDF File)'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CourseBundle\Entity\Matiere'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'coursebundle_matiere';
    }


}
