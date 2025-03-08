<?php

namespace App\Form;

use App\Entity\Argent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('revenus', MoneyType::class, [
                'currency' => 'EUR',
                'label' => 'Revenus (€)',
                'required' => false,
            ])
            ->add('depenses', MoneyType::class, [
                'currency' => 'EUR',
                'label' => 'Dépenses (€)',
                'required' => false,
            ])
            ->add('solde', MoneyType::class, [
                'currency' => 'EUR',
                'label' => 'Solde (€)',
                'required' => false,
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
                'required' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => ['rows' => 3]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Argent::class,
        ]);
    }
}
