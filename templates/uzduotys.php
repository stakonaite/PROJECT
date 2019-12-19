<?php

//$array = ['validate_not_empty', 'validate_number', 'validate_email'];
//
//function validate_not_empty()
//{
//    print 'validate is empty';
//}
//
//function validate_email()
//{
//    print 'validate email';
//}
//
//foreach ($array as $value) {
//    if (is_callable($value)) {
//        $value();
//    } else {
//        var_dump('neirasyta_funkcijos_reiksme');
//    }
//}

$users = [
    [
        'id' => 1,
        'name' => 'Bill',
    ],
    [
        'id' => 2,
        'name' => 'John',
    ],
];

$comments = [
    [
        'id' => 1,
        'userId' => 1,
        'date' => '2019-12-17',
        'comment' => 'This sucks'
    ],
    [
        'id' => 2,
        'userId' => 1,
        'date' => '2018-11-17',
        'comment' => 'I like that'
    ],
    [
        'id' => 3,
        'userId' => 2,
        'date' => '2019-10-17',
        'comment' => 'This is a comment'
    ],
];

$array = [];

foreach ($comments as $comment){
    foreach ($users as $user){
        if ($comment['userId'] === $user['id']){
            $comment['author'] = $user['name'];
            $array[] = $comment;
         //   print $user['name'] . $comment['comment'] . "</br>";
        }
    }
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
        .flex{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .div{
            display: flex;
            justify-content: space-around;
            height: 100px;
            width: 300px;
            border: 2px solid darkslateblue;
            margin: 10px;
        }
    </style>
</head>
<body class="flex">

<?php foreach ($array as $key):?>
<div class="div">
    <?php print $key['author'] . ' ' . $key['date'] . '</br>' . $key['comment'];?>
</div>
<?php endforeach;?>
</body>
</html>
