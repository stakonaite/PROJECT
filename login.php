<?php

require('bootloader.php');

if (isset($_SESSION['name'])) {
    header("Location: /test.php");
}

function validate_login($field_inputs)
{
    $db_array = file_to_array(DB_FILE);
    if (is_array($db_array)) {
        foreach ($db_array as $key => $value) {
            if ($value['name'] === $field_inputs['name'] && $value['password'] === $field_inputs['password']) {
                return true;
            }
        }
    }
    return false;
}

function form_success(&$form, $safe_input)
{
    unset($safe_input['password_repeat']);
    $_SESSION['name'] = $safe_input['name'];
    $_SESSION['password'] = $safe_input['password'];
    header("Location: /test.php");
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'Nepavyko prisijungti';
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

$h1 = 'Prisijungete sekmingai';

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
