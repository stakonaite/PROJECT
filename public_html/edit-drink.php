<?php

require '../bootloader.php';

function form_success_edit($safe_input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new App\Drinks\Drink($safe_input);
    $modelDrinks->update($drink);
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'FAILED';
}

$modelDrinks = new App\Drinks\Model();
$drink = $modelDrinks->getById($_GET['id']);

$form_edit = [
    'callbacks' => [
        'success' => 'form_success_edit',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
            'value' => $_GET['id'],
        ],
        'name' => [
            'value' => $drink->getName(),
            'label' => 'Pavadinimas',
            'type' => 'text',
            // 'error' => 'Ivyko klaida',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ],
                'attr' => [
                    'placeholder' => 'Pvz: Somersby'
                ]
            ]
        ],
        'amount' => [
            'value' => $drink->getAmount(),
            'label' => 'Kiekis(ml)',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number',
                ],
                'attr' => [
                    'placeholder' => 'Pvz: 500',
                ]
            ]
        ],
        'abarot' => [
            'value' => $drink->getAbarot(),
            'label' => 'Abarot(%)',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number',
                ],
                'attr' => [
                    'step' => '0.01',
                    'placeholder' => 'Pvz: 4.4',
                    'class' => 'field-abarot'
                ]
            ]
        ],
        'price' => [
            'value' => $drink->getPrice(),
            'label' => 'Price(€)',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number',
                ],
                'attr' => [
                    'step' => '0.01',
                    'class' => 'last-name',
                    'id' => 'last-name',
                    'placeholder' => 'Pvz: 10.1'
                ]
            ]
        ],
        'in_stock' => [
            'value' => $drink->getInStock(),
            'label' => 'In stock',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number',
                ],
                'attr' => [
                    //     'step' => '0.01',
                    'class' => 'last-name',
                    'id' => 'last-name',
                    'placeholder' => 'Pvz: 5'
                ]
            ]
        ],
        'image' => [
            'value' => $drink->getImage(),
            'label' => 'Nuotrauka(Url)',
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ],
                'attr' => [
                    'class' => 'last-name',
                    'id' => 'last-name',
                    'placeholder' => 'Pvz.: http://....'
                ]
            ]
        ],
    ],
    'buttons' => [
        'edit' => [
            'title' => 'Redaguoti',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

if (!empty($_POST)) {
    $safe_input = get_form_input($form_edit);
    $success = validate_form($safe_input, $form_edit);
} else {
    $success = false;
}

$views = [];
$views['form'] = new \App\Views\Form($form_edit);
$views['nav'] = new \App\Views\Navigation();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body>
<?php print $views['nav']->render(); ?>
<?php print $views['form']->render(); ?>
</body>
</html>

