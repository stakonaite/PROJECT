<?php

// format: alt+cmd+L

$form = [
    'attr' => [
        'action' => 'index.php',
        'class' => 'my=form',
        'id' => 'login-form'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name',
            'type' => 'text',
            'error' => 'Ivyko klaida',
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                ]
            ]
        ],
        'last_name' => [
            'label' => 'Last name',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'class' => 'last-name',
                    'id' => 'last-name',
                ]
            ]
        ],
    ],
    'buttons' => [
        'save' => [
            'title' => 'Save',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

$array = [
    'name' => 'lol'
];

if (isset($array['name'])) {
    $x = $array['name'];
} else {
    $x = 'nepavyko';
}

$x = $array['name'] ?? 'nepaejo';

var_dump($x);

function html_attr($attr)
{
    $attributes = [];

    foreach ($attr as $attr_index => $attr_value) {
        $attribute = "$attr_index=\"$attr_value\"";
        $attributes[] = $attribute;
    }

    return implode(' ', $attributes);
}

?>
<html>
<body>

<?php require('templates/form.tpl.php'); ?>

</body>
</html>

