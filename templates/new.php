<?php


$input = [
    'field_1' => 'text',
    'field_2' => 'text2',
    'field_3' => 'text',
    'field_4' => 'text'
];

$params = [
    'field_1',
    'field_3',
    'field_4',
];

foreach ($params as $field_id){
    $input[$field_id];
    $compare = $compare ?? $input[$field_id];
    if ($compare !== $input[$field_id]){
        var_dump('not');
        break;
    }
}


