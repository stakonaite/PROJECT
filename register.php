<?php

require('bootloader.php');

function validate_username($field_input, &$field)
{
    $db_array = file_to_array(DB_FILE);
    if (!empty($db_array)) {
        foreach ($db_array as $record) {
            if ($record['name'] == $field_input) {
                $field['error'] = 'toks vartotojas jau egzistuoja';
                return false;
            }
        }
    }
    return true;
}

function form_success(&$form, $safe_input)
{
    unset($safe_input['password_repeat']);
    $db_array = file_to_array(DB_FILE);
    $db_array[] = $safe_input;
    array_to_file($db_array, DB_FILE);
    //   $form['message'] = 'Registracija sėkminga!';
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'Registracija Nesekminga';
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
                'validate_username',
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
                    'placeholder' => 'Enter Password',
                ]
            ]
        ],
        'password_repeat' => [
            'validators' => [],
            'label' => 'Repeat Password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Repeat Password',
                ]
            ]
        ],
//        'Amzius' => [
//            'validators' => [
//                'validate_not_empty',
//                // 'validate_is_number',
//                //'validate_is_adult',
//                'validate_field_range' => [
//                    'min' => 20,
//                    'max' => 100,
//                ]
//            ],
//            'label' => 'Age',
//            'type' => 'text',
//            'value' => '',
//            'extra' => [
//                'attr' => [
//                    'placeholder' => 'Enter your age',
//                ]
//            ]
//        ]
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

if (!empty($_POST)) {
    $safe_input = get_filtered_input($form);
    $success = validate_form($form, $safe_input);
} else {
    $success = false;
}

$show_form = !$success;

function fill_form(&$form, $safe_input)
{
    foreach ($form['fields'] as $field_id => &$field) {
        $field['value'] = $safe_input[$field_id];
    }
}

if (isset($_COOKIE['form_values'])) {
    $decoded_cookie = json_decode($_COOKIE['form_values'], true);
    fill_form($form, $decoded_cookie);
}

$h1 = 'Registracija sekminga';

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
    <?php if ($show_form): ?>
        <?php require('templates/form.tpl.php'); ?>
    <?php else: ?>
        <h3><?php print $h1; ?></h3>
    <?php endif; ?>
</div>
</body>
</html>
