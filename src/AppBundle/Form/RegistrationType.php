<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use AppBundle\Entity\Classe;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);
        $builder->add('nome');
        $builder->add('cognome');
        $builder->add('classe', EntityType::class, [
            'class' => Classe::class,
            'choice_label' => function ($classe, $key, $index) {
                /** @var Classe $classe */
                return $classe->getAnno() . strtoupper($classe->getSezione());
            },
            'placeholder' => 'Classe',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('c')
                    ->orderBy('c.anno', 'ASC');
            },
            'attr' => [
                'class' => 'form-control',
                'style' => 'margin-bottom:15px'
            ],
            'required' => false,
            'expanded' => true,
            'multiple' => true,

        ]);
        $builder->remove('email');

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}