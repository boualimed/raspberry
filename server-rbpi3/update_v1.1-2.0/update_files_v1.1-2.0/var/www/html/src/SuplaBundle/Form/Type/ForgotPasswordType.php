<?php
/*
 src/SuplaBundle/Form/Type/ForgotPasswordType.php

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace SuplaBundle\Form\Type;

use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgotPasswordType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('email', TextType::class, ['label' => 'Email', 'required' => true]);
        $builder->add(
            'recaptcha',
            EWZRecaptchaType::class,
            [
                'attr' => [
                    'options' => [
                        'theme' => 'clean',
                    ],
                ],
            ]
        );
        $builder->add('Submit', SubmitType::class, ['label' => 'Submit',
            'attr' => ['class' => 'btn btn-default'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => 'SuplaBundle\Form\Model\ForgotPassword',
        ]);
    }

    public function getBlockPrefix() {
        return '_forgot_password_type';
    }
}
