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
    $form['message'] = 'You logged in succesfully!';
    foreach ($form['fields'] as $key => &$value) {
        $value['value'] = '';
     //   var_dump($value['value']);
    }
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'Log in failed, try again following the rules';
//$form['fields']['password']['value'] = '';  jeigu fail istrina laukelyje slaptazodi
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
                'validate_is_number'
            ],
            'label' => 'name',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'irasyti reiksme',
                ]
            ]
        ],
        'surname' => [
            'validators' => [
                'validate_not_empty',
                'validate_is_number'
            ],
            'label' => 'surname',
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