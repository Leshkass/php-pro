<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Client;
use App\Entity\Enum\BodyType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('brand', TextType::class, [
            'label' => 'Brand',
            'attr' => [
                'class' => 'sdfgsd',
                'placeholder' => 'Brand car'
            ]
        ])
            ->add('model', TextType::class, [
                'label' => 'Model',
                'attr' => [
                    'placeholder' => 'Model car',
                    'pattern' => false
                ]
            ])
            ->add('year', IntegerType::class, [
                'label' => 'Year',
                'attr' => [
                    'placeholder' => 'Year car',
                    'pattern' => false
                ]
            ])
            ->add('color', TextType::class, [
                'label' => 'Color',
                'attr' => [
                    'placeholder' => 'Color car'
                ]
            ])
            ->add('bodyType', EnumType::class, [
                'label' => 'Body Type',
                'class' => BodyType::class,
            ])
            ->add('clients', EntityType::class, [
                'class' => Client::class,
                'multiple' => true,
                'query_builder' => function (EntityRepository $repository): QueryBuilder {
                    return $repository->createQueryBuilder('c')
                        ->orderBy('c.id');
                },
                'choice_label' => 'fullName',
                'placeholder' => 'Select car client'
            ]);

    }

}