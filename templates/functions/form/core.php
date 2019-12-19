<?php

//if isseto trumpinys
//    $x = $array['key'] ?? 'default' {jeigu array yra key tai ji prisiskirs x variable'ui, jei ne, '' rasom reiksme kuri bus priskirta.


//function fill_form(&$form, $ivesti_duomenys)
//{
//    foreach ($ivesti_duomenys as $laukeli_ikuri_ivesta_index => $tai_kas_ivesta) {
//        $form['fields'][$laukeli_ikuri_ivesta_index]['value'] = $tai_kas_ivesta;
//    }
//}

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

function validate_form(&$form, $safe_input)
{
    $success = true;
    foreach ($form['fields'] as $field_id => &$field) {
        $field_value = $safe_input[$field_id];
        $field['value'] = $field_value;

        if (isset($field['validators'])) {
            foreach ($field['validators'] as $validator) {
                $is_valid = $validator($field_value, $field);
                if (!$is_valid) {
                    $success = false;
                    break;
                }
            }
        }
    }

    if (isset($form['callbacks'])) {
        $cb_index = $success ? 'success' : 'fail';
        $success_function = $form['callbacks'][$cb_index] ?? false;
        if ($success_function) {
            $success_function($form, $safe_input);
        }
    }

        return $success;
}
