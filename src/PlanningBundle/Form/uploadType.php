<?php

namespace PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class uploadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('classe', ChoiceType::class , array('label' => 'Level',
                'choices' => array('1st Grade'=>'1st Grade',
                    '2nd Grade'=>'2nd Grade',
                    '3rd Grade'=>'3rd Grade',
                    '4th Grade'=>'4th Grade',
                    '5th Grade'=>'5th Grade',
                    '6th Grade'=>'6th Grade')))
            ->add('picture', FileType::class, array('label'=>'Planning(PDF File)'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlanningBundle\Entity\upload'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'PlanningBundle_upload';
    }


}
