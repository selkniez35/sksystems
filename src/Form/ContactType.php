<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer votre nom.'),
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
            ->add('subject', ChoiceType::class, [
                'label' => 'Objet',
                'placeholder' => 'Sélectionnez un objet',
                'choices' => [
                    'Demande de devis' => 'devis',
                    'Site web' => 'site_web',
                    'Application web' => 'application_web',
                    'MVP' => 'mvp',
                    'Autre' => 'autre',
                ],
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer un objet.'),
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'constraints' => [
                    new NotBlank(message: 'Merci de décrire votre demande.'),
                    new Length(min: 10, max: 5000),
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
            'csrf_token_id' => 'contact',
        ]);
    }
}
