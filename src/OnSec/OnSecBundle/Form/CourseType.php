<?php

namespace OnSec\OnSecBundle\Form;

use OnSec\OnSecBundle\Entity\Instruction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use OnSec\OnSecBundle\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CourseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('description',
                        TextType::class, array(
                            'label' => 'Name:',
                            'attr' => array('class' => 'description',
                                            'placeholder' => 'Name')))

                ->add('room')
                        /*null, array(
                            'label' => 'CourseType: Raumnummer',
                            'attr' => array('class' => 'room')))*/

                ->add('instructions',
                        CollectionType::class, array(
                                'entry_type' => InstructionType::class,
                                'allow_add' => true,
                                'allow_delete' => true,
                                'by_reference' => false
                            ))
                        /*null, array(
                            'label' => 'CourseType: Unterweisungen',
                            'attr' => array('class' => 'instructions')))*/

                ->add('owner')
                       /* null, array(
                            'attr' => array('class' => 'owner')))*/

                ->add('moderators',
                        CollectionType::class, array(
                            'entry_type' => UserType::class,
                            'allow_add' => true,
                            'allow_delete' => true,
                            'prototype' => true
                        ))

                ->add('keywords',
                        CollectionType::class, array(
                            'entry_type' => KeywordType::class,
                            'allow_add' => true,
                            'allow_delete' => true,
                            'prototype' => true
                        ));



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
