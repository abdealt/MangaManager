<?php

// src/Form/MangaType.php
namespace App\Form;

use App\Entity\Manga;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('description')
            ->add('category')
            // Pour ajouter un champ de sélection avec possibilité de créer un nouveau tag
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',  // Assurez-vous que l'entité Tag a un champ 'name'
                'multiple' => true,        // Permet plusieurs tags
                'expanded' => false,       // Utilisation d'une liste déroulante
                'required' => false,       // Ce champ n'est pas obligatoire
                'attr' => ['class' => 'select2'], // Utilisation d'une bibliothèque comme Select2
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Manga::class,
        ]);
    }
}
