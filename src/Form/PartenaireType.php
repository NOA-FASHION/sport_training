<?php

namespace App\Form;

use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '50'
                ],
                'required'=> false,
                'label' => 'Nom',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank(),
                    new Assert\NotNull()
                ]
            ])
            ->add('active', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'Activation',
                'label_attr' =>[
                    'class'=> 'badge bg-primary fs-6 mr-5'
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('shortDescription', TextareaType::class, [
                'attr' =>[
                    'class' =>'form-control',
                    'min' => 1,
                    'max' => 5
                ],
                'label' => 'Courte description ',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' =>[
                 new Assert\NotBlank(),
                 new Assert\Length([100]),
                ]
            ])
            ->add('fullDescription', TextareaType::class, [
                'attr' =>[
                    'class' =>'form-control',
                    'min' => 1,
                    'max' => 5
                ],
                'label' => 'Description complete',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' =>[
                 new Assert\NotBlank(),
                 new Assert\Length([255]),
                ]
            ])
            ->add('logoUrl', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '50'
                ],
                'required'=> false,
                'label' => 'Adresse url logo',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('dpo', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '50'
                ],
                'required'=> false,
                'label' => 'Dpo',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length([100]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('technicalContact', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '100'
                ],
                'required'=> false,
                'label' => 'Contact technique',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length([50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('commercialContact', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' =>'2',
                    'maxlength' => '100'
                ],
                'required'=> false,
                'label' => 'Contact commercial',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[
                    new Assert\Length([50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('membersRead', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
                    'class'=> 'badge bg-primary mr-5 fs-6'
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersStat', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_stat',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('membersSubscription', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'members_subscription',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
                'label' => 'payment_schedules_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentSchedulesWrite', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'payment_shedule_write',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
                'label' => 'payment_days_read',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
                ],
                'constraints' =>[
                    new Assert\NotNull(),
                   
                ]
            ])
            ->add('paymentDayWrite', CheckboxType::class,[
                'attr' =>[
                    'class' =>'form-check-input fs-6',
                ],
                'required'=> false,
                'label' => 'payment_days_write',
                'label_attr' =>[
                    'class'=> 'badge bg-primary mr-5 fs-6'
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
            'data_class' => Partenaire::class,
        ]);
    }
}
