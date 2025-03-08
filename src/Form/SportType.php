<?php
namespace App\Form;

use App\Entity\Sport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
// Type de sport avec une liste déroulante
->add('typeSport', ChoiceType::class, [
'choices' => [
'Course' => 'course',
'Musculation' => 'muscu',
'Football' => 'foot',
// Ajoute d'autres types de sports si nécessaire
],
'required' => false, // Le champ peut être vide
'placeholder' => 'Choisir un sport', // Un placeholder pour la liste déroulante
])
// La date de l'activité sportive
->add('dateSport', DateTimeType::class, [
'required' => false,
'widget' => 'single_text', // Permet d'afficher la date dans un champ unique
])
// La description de l'activité sportive
->add('description', TextareaType::class, [
'required' => false,
]);
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
'data_class' => Sport::class,
]);
}
}
