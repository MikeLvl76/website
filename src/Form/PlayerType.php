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
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('photo', TextType::class, ['label' => 'Image url ', 'attr' => array('placeholder' => 'url/pic.png'),
            'constraints' => [new Assert\Callback([
                'callback' => static function(?string $value, ExecutionContextInterface $context){
                    if(!str_ends_with($value, ".png")){
                        $context
                            ->buildViolation('Url must end by ".png"')
                            ->atPath('[photo]')
                            ->addViolation();
                    }
                }
            ]
            )]])
            ->add('firstname', TextType::class, ['label' => 'First name ', 'attr' => array('placeholder' => 'firstname')])
            ->add('lastname', TextType::class, ['label' => 'Last name ', 'attr' => array('placeholder' => 'lastname')])
            ->add('age', IntegerType::class, ['label' => 'Age ', 'attr' => array('placeholder' => 'age')])
            ->add('size', IntegerType::class, ['label' => 'Size (cm) ', 'attr' => array('placeholder' => 'size')])
            ->add('nationality', TextType::class, ['label' => 'Country birth (put 3 first letters or official initials) ', 'attr' => array('placeholder' => 'nat')])
            ->add('club', EntityType::class, ['class' => Club::class, 'label' => 'Current club ', 'choice_label' => 'name', 'attr' => array('placeholder' => 'club')])
            ->add('national', EntityType::class, ['class' => National::class, 'label' => 'Country choosen ', 'choice_label' => 'name', 'attr' => array('placeholder' => 'country')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
