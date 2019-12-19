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


