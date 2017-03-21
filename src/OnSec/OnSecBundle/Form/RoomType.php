<?php

namespace OnSec\OnSecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RoomType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description',
                        TextType::class, array(
                            'label' => 'Raumnummer',
                            'attr' => array('class' => 'roomdescription',
                                            'label' => 'RoomType: Raumnummer',
                                            'placeholder' => 'G.EE.RR')));
        //$builder->add('description')->add('keywords'); //eigentlich!! // yyyy-MM-dd
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OnSec\OnSecBundle\Entity\Room'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'onsec_onsecbundle_room';
    }


}
