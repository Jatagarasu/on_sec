<?php

namespace OnSec\OnSecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class InstructionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('description')
          ->add('expiredate')
          ->add('pdfLink')
          ->add('keywords', CollectionType::class, array(
              'entry_type' => KeywordType::class,
              'allow_add' => true,
              'allow_delete' => true,
              'prototype' => true
          ))
          ->add('moderators')
          ->add('questions');

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OnSec\OnSecBundle\Entity\Instruction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'onsec_onsecbundle_instruction';
    }


}
