<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Partenaire;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChoicePartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('p',TextType::class,[
            'label'=>false,
            'required'=>false,
            'attr'=>[
                'class' =>'form-control ',
                'placeholder'=>'rechercher',
                'class' => 'mt-4 ',
            ]
                
            ])

            ->add('active', ChoiceType::class, [
                'choices'  => [
                    'Activés' => 'true',
                    'All' => null,
                    'désactivés' => 'false',
                ],
                'required'=>false,
                'attr' => [
                    'class' => 'form-select ',
                   
                ],
                'label' => 'Choix',
                'label_attr' => [
                    'class' => 'form-label  mr-2'
                ],
          
            ])
            ->add('submit', SubmitType::class,[
                'attr'=>[
                    'class' => 'btn btn-primary my-2'
                ],
                'label' =>'Valider'
               ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method'=>'GET',
            'csrf_protection'=>false
        ]);
    }
    public function getBlockPrefix(){
        return '';
    }
}
