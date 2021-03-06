<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\ApplicationType;

class AnnonceType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title', 
                TextType::class, 
                $this->getConfiguration('Titre', 'Ajoutez un titre à votre annonce', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'slug', 
                TextType::class, 
                $this->getConfiguration('Adresse web', 'Tapez l\'adresse web (automatique)', [
                    'required' => false,
                    'label_attr' => ['class' => 'col-sm-12']
                ])
            )
            ->add(
                'coverImage', 
                UrlType::class, 
                $this->getConfiguration('URL de l\'image principale', 'Ajoutez l\'adresse de l\'image principale', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'introduction', 
                TextType::class, 
                $this->getConfiguration('Introduction', 'Donnez une description global de l\'annonce', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'content', 
                TextareaType::class, 
                $this->getConfiguration('Description détaillé', 'Donnez une description détaillé', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'rooms', 
                IntegerType::class,
                 $this->getConfiguration('Nombre de chambres', 'Indiquez le nombre de chambre', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'price', 
                MoneyType::class, 
                $this->getConfiguration('Prix', 'Indiquez le prix par nuit', ['label_attr' => ['class' => 'col-sm-12']])
            )
            ->add(
                'images', 
                CollectionType::class, 
                [
                    'entry_type' => ImageType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'label_attr' => ['class' => 'col-sm-12']
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
