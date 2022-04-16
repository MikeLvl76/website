<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo', TextType::class, ['label' => 'Logo url ', 'attr' => array('placeholder' => 'link to png file'),
            'constraints' => [new Assert\Callback([
                'callback' => static function(?string $value, ExecutionContextInterface $context){
                    if(!str_ends_with($value, ".png")){
                        $context
                            ->buildViolation('Url must end by ".png"')
                            ->atPath('[logo]')
                            ->addViolation();
                    }
                }
            ]
            )]])
            ->add('name', TextType::class, ['label' => 'Name ', 'attr' => array('placeholder' => 'ex: name')])
            ->add('city', TextType::class, ['label' => 'City ', 'attr' => array('placeholder' => 'ex: city')])
            ->add('country', TextType::class, ['label' => 'Country ', 'attr' => array('placeholder' => 'ex: country')])
            ->add('total_tournaments', IntegerType::class, ['label' => 'Number of tournaments ', 'attr' => array('placeholder' => 'ex: 0'),
            'constraints' => [
                new Assert\PositiveOrZero([
                    'message' => 'Value must be positive or at least equals to 0.'
                ])]])
            ->add('won_tournaments', IntegerType::class, ['label' => 'Number of won tournaments ', 'attr' => array('placeholder' => 'ex: 0'),
            'constraints' => [
                new Assert\PositiveOrZero([
                    'message' => 'Value must be positive or at least equals to 0.'
                ])]])
            ->add('total_wins', IntegerType::class, ['label' => 'Number of wins until this year ', 'attr' => array('placeholder' => 'ex: 0'),
            'constraints' => [
                new Assert\PositiveOrZero([
                    'message' => 'Value must be positive or at least equals to 0.'
                ])]])
            ->add('total_loses', IntegerType::class, ['label' => 'Number of loses until this year ', 'attr' => array('placeholder' => 'ex: 0'),
            'constraints' => [
                new Assert\PositiveOrZero([
                    'message' => 'Value must be positive or at least equals to 0.'
                ])]])
            ->add('total_draws', IntegerType::class, ['label' => 'Number of draws until this year ', 'attr' => array('placeholder' => 'ex: 0'),
            'constraints' => [
                new Assert\PositiveOrZero([
                    'message' => 'Value must be positive or at least equals to 0.'
                ])]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
