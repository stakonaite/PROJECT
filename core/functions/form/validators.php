<?php

function validate_fields_match($filtered_input, &$form, $params)
{
    $match = true;

    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }

    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Laukai nesutampa!';
        return false;
    }

    return true;
}

function validate_not_empty($field_value, &$field)
{
    if (strlen($field_value) == 0) {
        $field['error'] = 'Laukas negali būti tuščias';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Įveskite skaičių!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field)
{
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
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

function validate_delivered_too_many($filtered_input, &$form)
{
    $cookie = new \Core\Cookie('tracking');
    var_dump($_COOKIE);
    $data = $cookie->read();
    if (isset($data['drinks_taken'])) {
        $data['drinks_taken']++;
    } else {
        $data['drinks_taken'] = 1;
    }
    $cookie->save($data, 60);
    var_dump($data['drinks_taken']);
    if ($data['drinks_taken'] >= 5) {
        $form['message'] = 'Baik gerti';
        return false;
    }
    return true;
}
