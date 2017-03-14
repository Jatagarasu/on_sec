<?php

namespace OnSec\OnSecBundle\Form;

use OnSec\OnSecBundle\Entity\Instruction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use OnSec\OnSecBundle\Form\RoomType;

class CourseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('description',
                        TextType::class, array(
                            'label' => 'Name',
                            'attr' => array('class' => 'description')))

                ->add('room',
                        RoomType::class, array(
                            'label' => ' ',
                            'attr' => array('class' => 'room')))

                ->add('instructions',
                        null, array(
                            'label' => 'Unterweisungen',
                            'attr' => array('class' => 'instructions')))

                ->add('owner',
                        null, array(
                            'label' => ' ',
                            'attr' => array('class' => 'owner')))

                ->add('moderators',
                        null, array(
                            'label' => ' ',
                            'attr' => array('class' => 'moderators')))

                //---Davids Keywords-------
                ->add('keywords',
                        CollectionType::class, array(
                            'entry_type' => KeywordType::class,
                            'allow_add' => true,
                            'allow_delete' => true,
                            'prototype' => true
                        ));


        //$builder->add('field_name', 'text', array('label' => 'Field Label', 'attr' => array('class' => 'fieldClass')));

        //$builder->add('description')->add('room')->add('owner')->add('subscribers')->add('moderators')->add('keywords')->add('instructions');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OnSec\OnSecBundle\Entity\Course'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'onsec_onsecbundle_course';
    }


}
