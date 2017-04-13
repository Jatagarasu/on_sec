<?php

namespace OnSec\OnSecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class InstructionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('description', TextType::class, [
              'label' => 'Titel',
          ])
          ->add('expiretime', IntegerType::class, [
              'label' => 'Ablaufzeit in Semestern',
          ])
          ->add('pdfFile', VichFileType::class, [
              'label' => "Unterweisung (PDF)",
              'allow_delete' => false,
              'required' => false,
          ])
          ->add('keywords', CollectionType::class, array(
              'entry_type' => KeywordType::class,
              'allow_add' => true,
              'allow_delete' => true,
              'by_reference' => false
          ))
          // Moderators are not added per usual form structure, hence commented out
          // ->add('moderators')
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
