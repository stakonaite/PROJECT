<?php

function validate_not_empty($field_value, &$field)
{
    if (empty($field_value)) {
        $field['error'] = 'Laukelis tuscias';
        return false;
    }
    return true;
}

function validate_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelis privalo buti skaicius';
        return false;
    }
    return true;
}

function validate_has_space($field_value, &$field)
{
    if (!preg_match('/\s/', $field_value)) {
        $field['error'] = 'Tarp reiksmiu privalo buti tarpas';
    }
    return true;
}

function validate_is_adult($field_value, &$field)
{
    if ($field_value >= 18 && $field_value < 100) {
        return true;
    } else {
        $field['error'] = 'Registracija galima nuo 18m';
        return false;
    }
}

function validate_field_range($field_value, &$field, $params)
{
    if ($field_value >= $params['min'] && $field_value < $params['max']) {
        return true;
    } else {
        $field['error'] = 'Skaicius turi būti tarp ' . $params['min'] . ' ir ' . $params['max'];
        return false;
    }
}

function validate_string_length($field_value, &$field, $params)
{
    if (strlen($field_value) <= $params['min']['value']) {
        $field['error'] = $params['min']['message'];
        return false;
    } elseif (strlen($field_value) >= $params['max']['value']) {
        $field['error'] = $params['max']['message'];
        return false;
    }

    return true;
}

function validate_fields_match($safe_input, &$form, $params){
    foreach ($params as $field_id){
        $compare = $compare ?? $safe_input[$field_id];
        if ($compare !== $safe_input[$field_id]){
            $form['fields'][$field_id]['error'] = 'nesutampa';
            return false;
        }
    }
    return true;
}
