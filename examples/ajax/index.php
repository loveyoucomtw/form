<?php

use Palmtree\Form\Form;
use Palmtree\Form\FormBuilder;
use Palmtree\Form\Type\TextType;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../bootstrap.php';

$builder = new FormBuilder([
    'key'             => 'simple_example',
    'ajax'            => true,
    'html_validation' => false,
]);

$builder
    ->add('name', TextType::class, [
        'label' => 'Please enter your name',
    ])
    ->add('email_address', 'email')
    ->add('phone_number', 'tel', ['required' => false])
    ->add('message', 'textarea', ['required' => false])
    ->add('newsletter', 'checkbox', [
        'label' => 'Sign up to our newsletter',
    ]);

$builder->add('send_message', 'submit', ['classes' => 'btn btn-primary']);

$form = $builder->getForm();

$form->handleRequest();

if ($form->isSubmitted() && Form::isAjaxRequest()) {
    if ($form->isValid()) {
        send_json([
            'message' => 'Thanks!',
        ]);
    } else {
        send_json_error([
            'errors' => $form->getErrors(),
        ]);
    }
}

$view = template('view.php', [
    'form'    => $form,
    'success' => (!empty($_GET['success'])),
]);

echo $view;
