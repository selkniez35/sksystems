<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuoteRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre nom.'),
                    new Length(max: 100),
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre prénom.'),
                    new Length(max: 100),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre email.'),
                    new Email(message: 'Cet email n\'est pas valide.'),
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'required' => false,
                'constraints' => [
                    new Length(max: 30),
                ],
            ])
            ->add('projectType', ChoiceType::class, [
                'label' => 'Type de projet',
                'placeholder' => 'Sélectionnez le type de projet',
                'choices' => [
                    'Site web' => 'site_web',
                    'Application web' => 'application_web',
                    'MVP' => 'mvp',
                    'Autre' => 'autre',
                ],
                'constraints' => [
                    new NotBlank(message: 'Merci de préciser le type de projet.'),
                ],
            ])
            ->add('budget', ChoiceType::class, [
                'label' => 'Budget estimé',
                'placeholder' => 'Sélectionnez une fourchette de budget',
                'required' => false,
                'choices' => [
                    'Moins de 2 000 €' => 'lt_2000',
                    '2 000 € - 5 000 €' => '2000_5000',
                    '5 000 € - 10 000 €' => '5000_10000',
                    'Plus de 10 000 €' => 'gt_10000',
                    'Je ne sais pas encore' => 'unknown',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Décrivez votre projet',
                'constraints' => [
                    new NotBlank(message: 'Merci de décrire votre projet.'),
                    new Length(min: 10, max: 1000),
                ],
            ])
            ->add('attachment', FileType::class, [
                'label' => 'Ajouter un fichier (facultatif)',
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File(
                        maxSize: '10M',
                        mimeTypes: ['application/pdf', 'image/png', 'image/jpeg'],
                        mimeTypesMessage: 'Merci de joindre un fichier PDF, PNG ou JPG (10 Mo max).',
                    ),
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
            'data_class' => null,
            'csrf_token_id' => 'quote_request',
        ]);
    }
}
