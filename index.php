<?php

$thermo = [
    [
        'form' => 'circle',
        'color' => 'green',
        'text' => '"As"',
    ],
    [
        'form' => 'sqr',
        'color' => 'green',
        'text' => '"B"',
    ],
    [
        'form' => 'sqr',
        'color' => 'orange',
        'text' => '"B"',
    ],
    [
        'form' => 'sqr',
        'color' => 'red',
        'text' => '"D"',
    ]
];

$stories = [
    ['color' => 'green', 'text' => 'Studinam'],
    ['color' => 'green', 'text' => 'Php'],
    ['color' => 'red', 'text' => 'su'],
    ['color' => 'orange', 'text' => 'Dainium'],
];

$rand_level = rand(0, 3);

function thermo_set_low(&$thermo)
{
    foreach ($thermo as &$figura) {
        $figura['color'] = 'red';
    }
}

thermo_set_low($thermo);


function thermo_set_level(&$thermo, $level)
{
    foreach ($thermo as $key => &$value) {
        if ($key > $level) {
            $value['color'] = 'grey';
        }
        if ($key != $level) {
            unset($value['text']);
        }
    }
}

thermo_set_level($thermo, $rand_level);

function build_storyline (&$stories, $level){
    foreach ($stories as $key => $story){
        if ($key > $level){
            unset($stories[$key]);
        }
    }
}
build_storyline($stories, $rand_level);

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
        .sqr_bckground {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border: 2px solid black;
            color: black;
        }

        .form.circle {
            border-radius: 50%;
        }

        .form.green {
            background-color: green;
        }

        .form.orange {
            background-color: orange;
        }

        .form.red {
            background-color: red;
        }

        .form.grey {
            background-color: grey;
        }
        li.red {
            color: red;
        }
        li.orange{
            color: orange;
        }
        li.green{
            color: green;
        }
    </style>
</head>

<body>

<?php require('templates/thermo.tpl.php'); ?>
<?php require('templates/stories.tpl.php'); ?>

</body>
</html>

