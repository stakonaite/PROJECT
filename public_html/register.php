<?php

use App\Users\Model;
use App\Views\Form;

require '../bootloader.php';


function form_success($safe_input, &$form)
{
    $modelUsers = new App\Users\Model();
    $user = new \App\Users\User($safe_input);
    $modelUsers->insert($user);
    $form['message'] = 'Registracija Sekminga!';
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
    'fields' => [
        'name' => [
            'label' => 'Name',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_string_length' => [
                        'min' => [
                            'value' => 7,
                            'message' => 'Name is too short',
                        ],
                        'max' => [
                            'value' => 50,
                            'message' => 'Name is too long'
                        ]
                    ]
                ],
                'attr' => [
                    'placeholder' => 'Vardas ir Pavarde',
                ]
            ]
        ],
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
                    'validate_string_length' => [
                        'min' => [
                            'value' => 7,
                            'message' => 'Password is too weak',
                        ],
                        'max' => [
                            'value' => 20,
                            'message' => 'Password is too long to handle'
                        ]
                    ]
                ],
                'attr' => [
                    'placeholder' => 'Password',
                ]
            ]
        ],
        'password_repeat' => [
            'label' => 'Repeat password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'validators' => [],
                'attr' => [
                    'placeholder' => 'Password',
                ]
            ]
        ]
    ],
    'buttons' => [
        'save' => [
            'title' => 'Register',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat',
        ]
    ]
];

$modelUsers = new \App\Users\Model();
$users = $modelUsers->get([]);

if (!empty($_POST)) {
    $safe_input = get_form_input($form);
    $success = validate_form($safe_input, $form);
} else {
    $success = false;
}

$view = [];
$views['form'] = new \App\Views\Form($form);
$views['nav'] = new \App\Views\Navigation();

?>

<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Templates</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
</header>
<body>
    <?php if ($success): ?>
        <h3>Forma zj bs</h3>
    <?php endif; ?>

    <?php print $views['nav']->render(); ?>
    <?php print $views['form']->render(); ?>
</body>
</html>

