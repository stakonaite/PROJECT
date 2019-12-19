<?php

require('templates/functions/form/core.php');
require('templates/functions/form/validators.php');
require('templates/functions/html.php');

function form_success(&$form, $safe_input)
{
    $x = $safe_input['x'];
    $y = $safe_input['y'];
    $sum = $x + $y;
    var_dump($sum);
}

function form_fail(&$form, $safe_input)
{
var_dump('klaida');
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
        'x' => [
            'validators' => [
                'validate_not_empty',
                'validate_is_number'
            ],
            'label' => 'x',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'irasyti reiksme',
                ]
            ]
        ],
        'y' => [
            'validators' => [
                'validate_not_empty',
                'validate_is_number'
            ],
            'label' => 'y',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'irasyti reiksme',
                ]
            ]
        ]
    ],
    'buttons' => [
        'clear' => [
            'title' => 'Clear',
            'extra' => [
                'attr' => [
                    'class' => 'clear-btn',
                ]
            ]
        ],
        'save' => [
            'title' => 'Save',
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

?>

<html>
<body>

<?php if ($success): ?>
    <h3>Iveskite skaicius</h3>

<?php endif; ?>
<?php require('templates/form.tpl.php'); ?>
</body>
</html>