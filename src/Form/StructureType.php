<?php

namespace App\Form;
use App\Entity\Structure;
use App\Repository\PartenaireRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('nameStructure', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '50'
                ],
                'required'=> false,
                'label' => 'Nom de la structure',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('nameResponsable', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '50'
                ],
                'required'=> false,
                'label' => 'Nom du responsable',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('adresseStructure', TextareaType::class, [
                'attr' =>[
                    'class' =>'form-control',
                    'min' => 1,
                    'max' => 5
                ],
                'label' => 'Adresse de la structure ',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' =>[
                 new Assert\NotBlank(),
               
                ]
            ])
            ->add('activeStructure', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'Activation',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersWrite', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_write',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersProduct', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_product',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersPayment', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_payment',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersStistiquesRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_stat',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersSubscriptionRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_subscription',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentSchedulesRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_schedules_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentShedulesWrite', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_shedule_write',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentDaysRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_days_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentDaysWrite', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_days_write',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5 '
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('submit', SubmitType::class,[
                'attr'=>[
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' =>'créer un partenaire'
               ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
