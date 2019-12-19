<?php

$form = [
    'attr' => [
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' => [
        'first_name' => [
            'validators' => [
                'validate_not_empty',
            //    'validate_has_space'
            ],
            'label' => 'First Name',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Your Name',
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

function get_filtered_input($form)
{
    $filter_params = [];
    foreach ($form['fields'] as $field_name => $field) {
        if (isset($field['filter'])) {
            $filter_params[$field_name] = $field['filter'];
        } else {
            $filter_params[$field_name] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }
    return filter_input_array(INPUT_POST, $filter_params);
}

//if isseto trumpinys
//    $x = $array['key'] ?? 'default' {jeigu array yra key tai ji prisiskirs x variable'ui, jei ne, '' rasom reiksme kuri bus priskirta.


//function fill_form(&$form, $ivesti_duomenys)
//{
//    foreach ($ivesti_duomenys as $laukeli_ikuri_ivesta_index => $tai_kas_ivesta) {
//        $form['fields'][$laukeli_ikuri_ivesta_index]['value'] = $tai_kas_ivesta;
//    }
//}

function validate_not_empty($field_value, &$field)
{
    if (empty($field_value)) {
        $field['error'] = 'Laukelis tuscias';
    }
}


function validate_form(&$form, $safe_input)
{
    foreach ($form['fields'] as $field_id => &$field) {
        $field_value = $safe_input[$field_id];
        $field['value'] = $field_value;

        if (isset($field['validators'])) {
            foreach ($field['validators'] as $validator) {
                $validator($field_value, $field);
            }
        }
    }
}



if (!empty($_POST)) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}


function html_attr($attr)
{
    $attributes = [];
    foreach ($attr as $attr_index => $attr_value) {
        $attribute = "$attr_index=\"$attr_value\"";
        $attributes[] = $attribute;
    }

    $attributes_string = implode(' ', $attributes);
    return $attributes_string;
}


?>
<html>
<body>
<h3>Iveskite varda</h3>
<?php require('templates/form.tpl.php'); ?>
</body>
</html>