<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class VisitorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('lastName')
                ->add('firstName')
                ->add('address')
                ->add('zipCode')
                ->add('city')
                ->add('hiringDate','date')
                ->add('username')
                ->add('password','password')
                ->add('save', 'submit', array(
                    'label' => 'Modifier',
        ));
    }

    public function getName() {
        return 'profil';
    }

}
