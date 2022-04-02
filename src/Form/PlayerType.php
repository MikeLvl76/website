<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\National;
use App\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'First name '])
            ->add('lastname', TextType::class, ['label' => 'Last name '])
            ->add('age', IntegerType::class, ['label' => 'Age '])
            ->add('size', IntegerType::class, ['label' => 'Size (cm) '])
            ->add('nationality', TextType::class, ['label' => 'Country birth (put 3 first letters or official initials) '])
            ->add('club', EntityType::class, ['class' => Club::class, 'label' => 'Current club ', 'choice_label' => 'name'])
            ->add('national', EntityType::class, ['class' => National::class, 'label' => 'Country choosen ', 'choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
