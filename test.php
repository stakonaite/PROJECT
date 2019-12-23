<?php

require('templates/functions/form/core.php');
require('templates/functions/form/validators.php');
require('templates/functions/html.php');

function form_success(&$form, $safe_input)
{
//    $x = $safe_input['x'];
//    $y = $safe_input['y'];
//    $sum = $x + $y;
//    var_dump($sum);
    $form['message'] = 'Gal ir normalus!';
    foreach ($form['fields'] as $key => &$value) {
        $value['value'] = '';
        //   var_dump($value['value']);
    }
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'Nenormalus';
//$form['fields']['password']['value'] = '';  jeigu fail istrina    laukelyje slaptazodi
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
            'validators' => [
                'validate_not_empty',
                'validate_has_space',
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
            'label' => 'Vardas ir Pavarde',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Vardas ir Pavarde',
                ]
            ]
        ],
        'password' => [
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
                ],
            ],
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Password',
                ]
            ]
        ],
        'password_repeat' => [
            'validators' => [],
            'label' => 'Repeat password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Password',
                ]
            ]
        ],
        'Amzius' => [
            'validators' => [
                'validate_not_empty',
                // 'validate_is_number',
                //'validate_is_adult',
                'validate_field_range' => [
                    'min' => 20,
                    'max' => 100,
                ]
            ],
            'label' => 'Amzius',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Amzius',
                ]
            ]
        ]
    ],
    'buttons' => [
//        'clear' => [
//            'title' => 'Clear',
//            'extra' => [
//                'attr' => [
//                    'class' => 'clear-btn',
//                ]
//            ]
//        ],
        'save' => [
            'title' => 'Ar as normalus?',
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

if (!empty($_POST)) {
    $safe_input = get_filtered_input($form);
    $success = validate_form($form, $safe_input);
} else {
    $success = false;
}

?>

<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Templates</title>
    <link rel="stylesheet" href="templates/CSS/normalize.css">
    <link rel="stylesheet" href="templates/CSS/style.css">
</header>
<body>
<div class="wrapper">
    <?php if ($success): ?>
        <h3>Iveskite skaicius</h3>

    <?php endif; ?>
    <?php require('templates/form.tpl.php'); ?>
</div>
</body>
</html>