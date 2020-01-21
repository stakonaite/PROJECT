<?php

use App\Drinks\Model;

require '../bootloader.php';

function form_success($safe_input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new \App\Drinks\Drink($safe_input);
    $modelDrinks->insert($drink);
}

function form_fail(&$form, $safe_input)
{
    $form['message'] = 'FAILED';
}

$form = [
    'callbacks' => [
        'success' => 'form_success',
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


$drink_1 = new \App\Drinks\Drink([
    'name' => 'Blanc',
    'amount' => 500,
    'abarot' => 3.6,
    'image' => 'https://pubgo4imgs.s3-accelerate.amazonaws.com/co/dobentltd/images/cropped/go4_apollo_dobentltd_imageUrl_1566384037.jpg',
//    'id' => 34,
]);

$drink_2 = new \App\Drinks\Drink([
    'name' => 'Somersby',
    'amount' => '500',
    'abarot' => 3.3,
    'image' => 'data:image/jpeg;base64,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',
]);

$drink_3 = new \App\Drinks\Drink([
    'name' => 'Svyturys',
    'amount' => '500',
    'abarot' => 4.4,
    'image' => 'http://res.cloudinary.com/ratebeer/image/upload/w_200,h_200,c_pad,d_beer_img_default.png,f_auto/beer_1384',
]);
$drink_4 = new \App\Drinks\Drink([
    'name' => 'Corona',
    'amount' => '330',
    'abarot' => 4.1,
    'image' => 'https://www.vynoguru.lt/media/catalog/product/cache/2/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/a/l/alus_corona_extra.jpg',
]);

if (!empty($_POST)) {
    $safe_input = get_form_input($form);
    $success = validate_form($safe_input, $form);
} else {
    $success = false;
}

$modelDrinks = new App\Drinks\Model();
//$modelDrinks->insert($drink_1);
//$modelDrinks->insert($drink_2);
//$modelDrinks->insert($drink_3);
//$modelDrinks->insert($drink_4);

$drinks = $modelDrinks->get([]);

//foreach ($drinks as $drink){
//    $drink->setName('alus');
//    $modelDrinks->update($drink);
//}


//var_dump($drink->getData());

//$file_db->deleteRow('USERS', 1)

$view = [];
$views['nav'] = new \App\Views\Navigation();
$views['form'] = new \App\Views\Form($form);


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

    <?php foreach ($drinks as $drink): ?>
        <div class="flex_card">
            <img src="<?php print $drink->getImage(); ?>">
            <div class="flex_name">
                <div><?php print $drink->getName(); ?></div>
                <?php print $drink->getAmount(); ?>
            </div>
            <div class="position_abs"><?php print $drink->getAbarot(); ?></div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
