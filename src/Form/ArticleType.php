<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Saisir le nom"
                ]
            ])
            ->add('photo', FileType::class, [
                "required" => false,
                "label" => false,
                "constraints" => [
                    new File([
                        'mimeTypes' => [
                            "image/png",
                            "image/jpg",
                            "image/jpeg"
                        ],
                        'mimeTypesMessage' => "Extensions autorisées: PNG, JPG, JPEG"
                    ])
                ],
            ])

            ->add('prix', NumberType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Saisir le prix"
                ]
            ])
            ->add('reference', TextType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Saisir la référence"
                ]
            ])
            ->add('description', TextType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Saisir la description"
                ]
            ])
            ->add('Valider', SubmitType::class)

            ->add('categorie', EntityType::class, [
                "label" => false,
                "class" => Categorie::class,
                "choice_label" => "nom",

            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}