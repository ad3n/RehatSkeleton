<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group', EntityType::class, array(
                'class' => 'AppBundle\Entity\Group',
                'attr' => array(
                    'storage' => array(
                        'route' => 'groups_list',
                    )
                )
            ))
            ->add('full_name', TextType::class)
            ->add('email', TextType::class)
            ->add('phone_number', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
            'csrf_protection' => false,
        ));
    }
}
