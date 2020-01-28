<?php

use App\Orders\Model;

require '../bootloader.php';

$form_delivery_btn = [
    'callbacks' => [
        'success' => 'form_success_delivery',
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
        'delivery' => [
            'title' => 'Pristatyti',
            'extra' => [
                'attr' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

function form_success_delivery($safe_input, &$form)
{
    $modelOrders = new \App\Orders\Model();
    $order = $modelOrders->getById($safe_input['id']);
    $order->setStatus('delivered');
    $modelOrders->update($order);
}

$modelOrders = new \App\Orders\Model();
$orders = $modelOrders->get([]);

$view = [];
$views['nav'] = new \App\Views\Navigation();
$views['delivery_form'] = new \App\Views\Form($form_delivery_btn);

$modelDrinks = new \App\Drinks\Model();
$drink = new \App\Drinks\Drink();


foreach ($orders as $order) {
    $form_delivery_btn['fields']['id']['value'] = $order->getId();
    $drinks_orders_array[] = [
        'order' => $order,
        'drink' => $modelDrinks->getById($order->getDrinkId()),
        'delivery_form' => new \App\Views\Form($form_delivery_btn),
    ];
}

If (!empty($_POST)) {
    $safe_input = get_form_input($form_delivery_btn);
    $success = validate_form($safe_input, $form_delivery_btn);
}

?>

<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Templates</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
</header>
<body>
<?php print $views['nav']->render(); ?>
<div class="flex">
    <table>
        <tr>
            <th>Gėrimo pavadinimas</th>
            <th>Užsakymo ID</th>
            <th>Gėrimo ID</th>
            <th>Data</th>
            <th>Status</th>
            <th>Veiksmai</th>
        </tr>
        <?php foreach ($drinks_orders_array as $item): ?>
            <tr>
                <td>
                    <?php print $item['drink']->getName(); ?>
                </td>
                <td>
                    <?php print $item['order']->getId(); ?>
                </td>
                <td>
                    <?php print $item['order']->getDrinkId(); ?>
                </td>
                <td>
                    <?php print $item['order']->getTimestamp(); ?>
                </td>
                <td>
                    <?php print $item['order']->getStatus(); ?>
                </td>
                <td>
                    <?php if ($item['order']->getStatus() == 'Uzsakyta') print $item['delivery_form']->render(); ?>
                </td>

            </tr>
        <?php endforeach; ?>
</div>
</table>
</body>
</html>


