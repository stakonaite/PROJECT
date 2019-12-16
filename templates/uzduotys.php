<?php

$natos = [
    'C',
    'D',
    'E',
    'F',
    'G',
    'A',
    'B'
];

$root = rand(0, count($natos) - 1);
//arba $natu_rand = array_rand($natos);
$chord = [];

for ($i = 0; $i < 3; $i++, $root += 2) {
    if ($root >= count($natos)) {
        $nata = $root - count($natos);
    } else {
        $nata = $root;
    }
    $chord[$nata] = $natos[$nata];
}

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
        .bckground {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .div {
            width: 50px;
            height: 100px;
            border: 2px solid black;
            padding: 10px;
            margin: 10px;
        }

        .push {
            background-color: grey;
        }
    </style>
</head>
<body>


<div class="bckground">
    <!--Trumpa versija
<!--    --><?php //foreach ($natos as $key => $nata): ?>
<!--    <div class="div--><?php //print isset($chord[$key]) ? 'push' : ''; ?><!--">-->
<!--        <span>--><?php //print $nata; ?><!--</span>-->
<!--    </div>-->
<!--    --><?php //endforeach; ?>


    <?php foreach ($natos as $key => $nata): ?>
        <?php if (isset($chord[$key])): ?>
            <div class="div push">
                <span><?php print $nata; ?></span>
            </div>
        <?php else: ?>
            <div class="div">
                <span><?php print $nata; ?></span>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

</body>
</html>
