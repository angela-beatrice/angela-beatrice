<?php

namespace App\Form;

use App\Entity\Synopsis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SynopsisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomAnime',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('TitreAlter',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Genre',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Theme',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Origine',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Studio',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('AgeConseiller',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('NombreEpisode',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('titreOrigin',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('dateDiffusion',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('PubliAverti',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Synopsis',TextareaType::class, ['attr' => ['class' => 'form-control']])
            ->add('AnimeImage', FileType::class, [
                'attr'     => ['class' => 'form-control',],
                'mapped' => false,])
            ->add('save', SubmitType::class, ['label' => 'Ajouter']);
            
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Synopsis::class,
        ]);
    }
}
