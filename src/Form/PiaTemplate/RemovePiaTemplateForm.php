<?php

/*
 * Copyright (C) 2015-2018 Libre Informatique
 *
 * This file is licensed under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace PiaApi\Form\PiaTemplate;

use PiaApi\Form\BaseForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class RemovePiaTemplateForm extends BaseForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('submit', ButtonType::class, [
                'attr' => [
                    'class' => 'ui fluid red button',
                ],
                'label' => 'pia.templates.forms.remove.submit',
            ])
        ;
    }
}
