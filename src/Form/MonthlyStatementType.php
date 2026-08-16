<?php

namespace App\Form;

use App\Entity\MonthlyStatement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class MonthlyStatementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('month', DateType::class, [
                'label' => 'Mois',
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer le mois concerné.'),
                ],
            ])
            ->add('revenue', MoneyType::class, [
                'label' => 'Facturation du mois (chiffre d\'affaires)',
                'currency' => 'EUR',
                'html5' => true,
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer la facturation du mois.'),
                    new PositiveOrZero(message: 'La facturation ne peut pas être négative.'),
                ],
            ])
            ->add('expenses', MoneyType::class, [
                'label' => 'Charges déduites',
                'currency' => 'EUR',
                'html5' => true,
                'constraints' => [
                    new NotBlank(message: 'Merci d\'indiquer les charges du mois.'),
                    new PositiveOrZero(message: 'Les charges ne peuvent pas être négatives.'),
                ],
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Notes (optionnel)',
                'required' => false,
                'constraints' => [
                    new Length(max: 2000),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MonthlyStatement::class,
            'csrf_token_id' => 'monthly_statement',
        ]);
    }
}
