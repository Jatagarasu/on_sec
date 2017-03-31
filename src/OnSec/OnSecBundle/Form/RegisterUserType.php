<?php

namespace OnSec\OnSecBundle\Form;

use OnSec\OnSecBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Email;


class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label' => 'Vorname'))
            ->add('surname', TextType::class, array('label' => 'Nachname'))
            ->add('email', EmailType::class, array('label' => 'eMail'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Passwort'),
                'second_options' => array('label' => 'Passwort wiederholen'),
            ))
            /*->add('notificationActive')*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}