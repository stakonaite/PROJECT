<?php
//require ('bootloader.php');

function form_success(&$form, $safe_input)
{

}

function form_fail(&$form, $safe_input)
{
}

$form = [
    'validators' => [
        'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' => [
        'name' => [
            'label' => 'Name and Surname',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter Name and Surname',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter Password',
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

?>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Templates</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
</header>
<body>
<div class="wrapper">
</div>
</body>
</html>
