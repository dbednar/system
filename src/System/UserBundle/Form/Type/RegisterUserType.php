<?php

namespace System\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class RegisterUserType extends BaseType {
    
     public function buildForm(FormBuilderInterface $builder, array $options = null) {
       parent::buildForm($builder, $options);
        $builder
                ->add('username',TextType::class, [
                    'label' => "Username (required)",
                    'attr' => [
                        'placeholder' => "Username",
                        'maxlength' => '30',
                        'class' => 'form-control'
                    ],
                    'label_attr' => [
                        'class' => 'strong'
                    ],
                    'required' => true,
                ])
               
                ->add('email',EmailType::class, [
                    'label' => 'Email (required)',
                    'attr' => [
                        'placeholder' => 'Email',
                        'maxlength' => '60',
                        'class' => 'form-control'
                    ],
                    'label_attr' => [
                        'class' => 'strong'
                    ],
                    'required' => true,
                ])
                ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array(
                    'label' => 'Password (required)',
                    'attr' => [
                        'placeholder' => "Password",
                        'maxlength' => '10',
                        'class' => 'form-control'
                    ],
                    'label_attr' => [
                        'class' => 'strong'
                    ],
                    
                    ),
                'second_options' => array(
                    'label' => 'Repeat password (required)',
                    'attr' => [
                        'placeholder' => "Repeat password",
                        'class' => 'form-control',
                        'maxlength' => '10',
                    ],
                    'label_attr' => [
                            'class' => 'strong'
                         ],
                    
                ),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
                ->add('roles', CollectionType::class, array(
                    'entry_type'   => ChoiceType::class,
                    
                    'entry_options'  => array(
                        'label' => "Role for user",
                        'attr' => array(
                                    'class' => 'form-control'
                                ), 
                        'label_attr' => [
                            'class' => 'strong'
                         ],
                        'choices' => array(
                            'Role User' => "ROLE_USER",
                            'Role Admin' => "ROLE_ADMIN",
                            'Role Child' => "ROLE_CHILD",
                            'Role Staff' => "ROLE_STAFF",
                        ),
                        'placeholder' => 'Please Select Role',
                        
                    ),
                ))
                ->add('enabled', CheckboxType::class, [
                    'label' => 'Active',
                    'label_attr'=> array(
                        'class' => 'checkbox-inline strong'
                    ),
 
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Add User',
                    'attr' => [
                        'class' => 'btn btn-success save_user',
                        'data-loading-text' => "<i class='fa fa-circle-o-notch fa-spin'></i> Save",
                        'id' => "load",
                    ],
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'System\LoginBundle\Entity\User',
        ));
    }

    public function getBlockPrefix() {
        return 'app_user_registration';
    }

    public function getName() {
        return $this->getBlockPrefix();
    }
    
    
}
