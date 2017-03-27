<?php

namespace OnSec\OnSecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class InstructionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('description')
          ->add('expiretime')
          ->add('pdfLink', FileType::class, array('label' => 'PDF'))
          ->add('keywords', CollectionType::class, array(
              'entry_type' => KeywordType::class,
              'allow_add' => true,
              'allow_delete' => true,
              'by_reference' => false
          ))
          ->add('moderators')
          ->add('questions', CollectionType::class, array(
              'entry_type' => QuestionType::class,
              'allow_add' => true,
              'allow_delete' => true,
              'by_reference' => false
          ));

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
