<?php

namespace System\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class AdminEditUserType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
                ->add('id', HiddenType::class)
                ->add('username',TextType::class, array(
                    "label" => "Username (required)",
                    "attr" => array(
                        'placeholder' => "username",
                        'class' => 'form-control'
                    ),
                    "label_attr"=>array(
                        'class'=> 'strong',
                    ),
                ))    
                ->add('email',EmailType::class, array(
                    "label" => "Email (required)",
                    "attr" => array(
                        'placeholder' => "Email",
                        'class' => 'form-control'
                    ),
                    "label_attr"=>array(
                        'class'=> 'strong',
                    ),
                ))
                ->add('roles', CollectionType::class, array(
                    'entry_type'   => ChoiceType::class,
                    
                    'entry_options'  => array(
                        'label' => "Role for user",
                        'attr' => array(
                                    'class' => 'form-control'
                                ),       
                        'choices' => $options['role'],
                        "label_attr"=>array(
                            'class'=> 'strong',
                        ),
                        
                    ),
                ))
                ->add('enabled', CheckboxType::class, [
                    'label' => 'Active',
                    'label_attr'=> array(
                        'class' => 'checkbox-inline strong'
                    ),
                    
                    'required' => false,
 
                ])
                ->add("save", SubmitType::class, array(
                    "label" => "Save Changes",
                    "attr" => [
                        'class' => 'btn btn-success edit_user',
                        'data-loading-text' => "<i class='fa fa-circle-o-notch fa-spin'></i> Save",
                        'id' => "load",
                    ],
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'System\UserBundle\Entity\User',
            'role' => '',
        ));
    }
    
}
