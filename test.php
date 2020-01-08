<?php

require('bootloader.php');

$logged_in = is_logged_in();
$table = prepare_table(file_to_array(DB_FILE));
?>

<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Templates</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
</header>
<body>
<div class="wrapper">
    <?php if ($logged_in): ?>
        <?php require('templates/table.php'); ?>
    <?php else: ?>
    <h3>To see the Table please <a href="login.php"> log in!</h3>
    <?php endif; ?>
</div>
</body>
</html>