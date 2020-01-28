<?php

use App\Drinks\Model;

require '../bootloader.php';

function form_success_form($safe_input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new \App\Drinks\Drink($safe_input);
    $modelDrinks->insert($drink);

}

function form_success_delete($safe_input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new \App\Drinks\Drink($safe_input);
    $modelDrinks->delete($drink);
}

function form_success_order($safe_input, &$form)
{
    $modelOrders = new App\Orders\Model();
    $order = new \App\Orders\Order([
        'timestamp' => time(),
        'drink_id' => $safe_input['id'],
        'status' => 'Uzsakyta',
    ]);
    $modelOrders->insert($order);
    $modelDrinks = new App\Drinks\Model();
    $drink = $modelDrinks->getById($safe_input['id']);

    $in_stock_get = $drink->getInStock() - 1;
    $drink->setInStock($in_stock_get);
    $modelDrinks->update($drink);
}


function form_fail(&$form, $safe_input)
{
    $form['message'] = 'FAILED';
}

$form_create = [
    'callbacks' => [
        'success' => 'form_success_form',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'action' => 'index.php',
        'class' => 'my=form',
        'id' => 'login-form'
    ],
    'fields' => [
        'name' => [
            'label' => 'Pavadinimas',
            'type' => 'text',
            // 'error' => 'Ivyko klaida',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ],
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Pvz: Somersby'
                ]
            ]
        ],
        'amount' => [
            'label' => 'Kiekis(ml)',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number',
                ],
                'attr' => [
                    'class' => 'last-name',
                    'id' => 'last-name',
                    'placeholder' => 'Pvz: 500',
                ]
            ]
        ],
        'abarot' => [
            'label' => 'Abarot(%)',
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
                    'placeholder' => 'Pvz: 4.4'
                ]
            ]
        ],
        'price' => [
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
        'save' => [
            'title' => 'Sukurti',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

$form_delete = [
    'callbacks' => [
        'success' => 'form_success_delete'
    ],
    'attr' => [
        'method' => 'POST',
        'class' => 'my=form',
        'id' => 'login-form'
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
        ]
    ],
    'buttons' => [
        'delete' => [
            'title' => 'Ištrinti',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

$form_edit = [
    'callbacks' => [
        'success' => 'form_success_edit'
    ],
    'attr' => [
        'method' => 'GET',
        'action' => 'edit-drink.php'
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
        ]
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

$form_order = [
    'validators' => [
        'validate_delivered_too_many'
    ],
    'callbacks' => [
        'success' => 'form_success_order'
    ],
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
        ]
    ],
    'buttons' => [
        'order' => [
            'title' => 'Užsakyti',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

if (!empty($_POST)) {
    switch (get_form_action()) {
        case 'delete':
            $safe_input = get_form_input($form_delete);
            $success = validate_form($safe_input, $form_delete);
            break;
        case 'save':
            $safe_input = get_form_input($form_create);
            $success = validate_form($safe_input, $form_create);
            break;
        case 'order':
            $safe_input = get_form_input($form_order);
            $success = validate_form($safe_input, $form_order);
            break;
        case 'edit':
            $safe_input = get_form_input($form_edit);
            $success = validate_form($safe_input, $form_edit);
            break;
    }
    $success = false;
}

$modelDrinks = new App\Drinks\Model();
$drinks = $modelDrinks->get([]);


$view = [];
$views['nav'] = new \App\Views\Navigation();
$views['form'] = new \App\Views\Form($form_create);

$catalog = [];
foreach ($drinks as $drink) {
    $form_delete['fields']['id']['value'] = $drink->getId();
    $form_order['fields']['id']['value'] = $drink->getId();
    $form_edit['fields']['id']['value'] = $drink->getId();
    $catalog[] = [
        'form_delete' => new \App\Views\Form($form_delete),
        'form_order' => new \App\Views\Form($form_order),
        'form_edit' => new \App\Views\Form($form_edit),
        'dataholder' => $drink,
    ];
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <title>OOP</title>
</head>
<body>
<?php print $views['nav']->render(); ?>

<?php if (\App\App::$session->userLoggedin()): ?>
    <div class="form-container">
        <?php print $views['form']->render(); ?>
    </div>
<?php endif; ?>

<div class="flex">

    <?php foreach ($catalog as $item): ?>
        <div class="flex-card-stock">
            <div class="flex-card">
                <img src="<?php print $item['dataholder']->getImage(); ?>">
                <div class="flex-name">
                    <div><?php print $item['dataholder']->getName(); ?></div>
                    <?php print $item['dataholder']->getAmount(); ?>
                </div>
                <div class="position-price"><?php print $item['dataholder']->getPrice() . "€"; ?></div>
                <div class="position-abarot"><?php print $item['dataholder']->getAbarot(); ?></div>
            </div>
            <div class="stock-color"> <?php print "Sandėlyje: " . $item['dataholder']->getInStock(); ?></div>

            <?php if (\App\App::$session->userLoggedin()): ?>
                <div class="form-container">
                    <?php print $item['form_delete']->render(); ?>
                    <?php print $item['form_edit']->render(); ?>
                </div>
            <?php else: ?>
                <?php print $item['form_order']->render(); ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
