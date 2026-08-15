<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjectProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Nom / raison sociale',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre nom ou celui de votre entreprise.'),
                    new Length(max: 150),
                ],
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre du projet',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer un titre pour votre projet.'),
                    new Length(max: 150),
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Décrivez votre projet',
                'constraints' => [
                    new NotBlank(message: 'Merci de décrire votre projet.'),
                    new Length(min: 20, max: 5000),
                ],
            ])
            ->add('contactEmail', EmailType::class, [
                'label' => 'Votre email (non affiché publiquement)',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre email.'),
                    new Email(message: 'Cet email n\'est pas valide.'),
                ],
            ])
            ->add('budget', TextType::class, [
                'label' => 'Budget envisagé (optionnel)',
                'required' => false,
                'constraints' => [
                    new Length(max: 100),
                ],
            ])
            // Piège à robots : ce champ doit rester vide (masqué en CSS pour les humains).
            ->add('website', TextType::class, [
                'label' => 'Laissez ce champ vide',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new Blank(message: 'Ce champ doit rester vide.'),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
            'csrf_token_id' => 'project_proposal',
        ]);
    }
}
