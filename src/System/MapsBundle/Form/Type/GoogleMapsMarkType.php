<?php

namespace System\MapsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use System\MapsBundle\Entity\GoogleMapsMark;


class GoogleMapsMarkType extends AbstractType{
   
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextareaType::class,array(
                
            ))
            ->add('colorPoint', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ),
                'placeholder'=> "Wybierz kolor"
            ))
            ->add('id', HiddenType::class, array(
                
            ))
            ->add('save', SubmitType::class)
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => GoogleMapsMark::class,
    ));
}
    
}
