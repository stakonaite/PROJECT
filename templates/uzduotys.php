<?php
/*
$array = [
        't' => [
            'b' => [
                'a' => 'my value'
            ]
        ]
];

$array['t']['b'][] = 'my value';
var_dump($array);
*/

/*
$receptai = [];

$ingridientai = [
    'obuolys',
    'miltai',
    'cukrus',
    'pienas'
];

foreach ($ingridientai as $produktas) {
    $receptai['pyragas'][] = $produktas;
}

var_dump($receptai);

*/
/*
$one = 't';
$two = ['au' => 'pzdc'];
$three = [$one => $two];

$three = [
    't' => [
        'au' => 'pzdc'
    ]
];

print $three['t']['au'];
*/

/*
$a = 1;
$b = 4;

function add($number_1, $number_2){
    $number = $number_1 + $number_2;
    return $number;
}

print add($a, $b);

*/

/*
$form = [
    'fields' => [
        'first_name' => [
            'value' => ''
        ]
    ]
];

function change(&$field){
    $field['value'] = 'Aurimas';
}

foreach ($form['fields'] as &$field){
    change($field);
}

var_dump($form);
*/

$library = [
    [
        'name' => 'Harry Potter',
        'author' => 'J.K.Rowling',
        'Year' => '1997',
    ],
    [
        'name' => 'A glass of milk',
        'author' => 'Herbjord Wassmo',
        'Year' => '2006',
    ],
    [
        'name' => 'Dessert Flower',
        'author' => 'Waris Dirie',
        'Year' => '2009',
    ],
    [
        'name' => 'The day I Learned to Live',
        'author' => 'Laurent Gounelle',
        'Year' => '2015',
    ],
];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .background {
            display: flex;
            flex-wrap: wrap;
        }
        .book {
            width: calc(100% / 3 - 8px);
            box-sizing: border-box;
            height: 180px;
            border: 2px solid green;
            background-color: lightpink;
            color: dimgrey;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-right: 12px;
            margin-bottom: 12px;
        }

        .book:nth-child(3n){
            margin-right: 0;
        }
    </style>
</head>
<body>

<div class="background">
    <?php foreach ($library as $book): ?>
    <div class="book">
        <?php print $book['name'] . ' ' . $book['author'] . ' ' . $book['Year']; ?>
    </div>
    <?php endforeach;?>
</div>

</body>
</html>
