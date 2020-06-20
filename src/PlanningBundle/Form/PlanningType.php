<?php

namespace PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('niveau',  ChoiceType::class,array(
                'choices'=> array(
                    '  ' => '  ',
                    '1er' => '1er',
                    '2eme'=>'2eme',
                    '3eme' =>'3eme',
                    '4eme'=>'4eme',
                    '5eme'=>'5eme',
                    '6eme'=>'6eme',
                )
            ))
            ->add('matiere1', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('matiere2', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('matiere3', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )

            ))
            ->add('matiere4',  ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('matiere5',  ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('activite1', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('matiere6',  ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('matiere7', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('activite2', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('matiere8', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))
            ->add('matiere9', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Mathematiques' => 'Mathematiques',
                    'Physique'=>'Physique',
                    'Lecture' =>'Lecture',
                    'Expression ecrite'=>'Expression ecrite',
                    'Francais'=>'Francais',
                    'Arabe'=>'Arabe',
                    'Anglais'=>'Anglais',
                    'Histoire et Geographie'=>'Histoire et Geographie',
                    'Informatique'=>'Informatique',
                )
            ))


            ->add('activite3', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('activite4',ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('activite5', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('activite6', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ))
            ->add('activite7', ChoiceType::class,array(
                'choices'=>array(
                    '  ' => '  ',
                    'Tennis' => 'Tennis',
                    'Sport'=>'Physique',
                    'Dance' =>'Sport',
                    'Natation'=>'Natation',
                    'Musique'=>'Musique',
                    'Theatre'=>'Theatre',
                    'Calcul Mental'=>'Calcul Mental',
                    'Dessin'=>'Dessin',
                    'Basket'=>'Basket',
                )
            ));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlanningBundle\Entity\Planning'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'PlanningBundle_Planning';
    }


}
