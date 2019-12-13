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
    </style>
</head>

<body>

<?php require('templates/thermo.tpl.php'); ?>

</body>
</html>

