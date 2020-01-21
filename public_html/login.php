<?php

use App\Users\Model;

require '../bootloader.php';


function form_success($safe_input, &$form)
{
    header('Location:Index.php');
}

function form_fail($safe_input, &$form)
{
    $form['message'] = 'Registracijos forma uzpildyta neteisingai, bandykite dar karta';
}


$form = [
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'validators' => [
        'validators' => 'validate_login'
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
                'attr' => [
                    'class' => 'last-name',
                    'id' => 'last-name',
                    'placeholder' => 'Write your email',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
                'attr' => [
                    'placeholder' => 'Password',
                ]
            ]
        ]
    ],
    'buttons' => [
        'save' => [
            'title' => 'Log in',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
];

if (!empty($_POST)) {
    $safe_input = get_form_input($form);
    $success = validate_form($safe_input, $form);
} else {
    $success = false;
}


$views = [];
$views['form'] = new \App\Views\Form($form);
$views['nav'] = new \App\Views\Navigation();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body>
<?php print $views['nav']->render(); ?>
<?php print $views['form']->render(); ?>
</body>
</html>
