<?php

namespace App\Form;

use App\Entity\National;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class NationalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('flag', TextType::class, ['label' => 'Flag icon url ', 'attr' => array('placeholder' => 'flag'),
            'constraints' => [new Assert\Callback([
                'callback' => static function(?string $value, ExecutionContextInterface $context){
                    if(!str_ends_with($value, ".png")){
                        $context
                            ->buildViolation('Url must end by ".png"')
                            ->atPath('[flag]')
                            ->addViolation();
                    }
                }
            ]
            )]])
            ->add('name', TextType::class, ['label' => 'Name ', 'attr' => array('placeholder' => 'name')])
            ->add('country', TextType::class, ['label' => 'Representated country ', 'attr' => array('placeholder' => 'country')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => National::class,
        ]);
    }
}
