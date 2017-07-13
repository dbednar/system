<?php

namespace System\MapsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class GoogleMapsMarkType extends AbstractType{
   
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextareaType::class,array(
                
            ))
            ->add('colorPoint', HiddenType::class, array(
                
            ))
            ->add('id', HiddenType::class, array(
                
            ))
            ->add('save', SubmitType::class)
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => "System\MapsBundle\Entity\GoogleMapsMark",
    ));
}
    
}
