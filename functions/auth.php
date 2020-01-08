<?php

function is_logged_in()
{
    $array = file_to_array(DB_FILE);
    foreach ($array as $value) {
        if ($value['name'] === $_SESSION['name']) {
            if ($value['password'] !== $_SESSION['password']) {
                header('location:logout.php');
            } else {
                return true;
            }
        }
    }
    return false;
}

function logout($redirect = false)
{
    $_SESSION = [];
    setcookie(session_name(), null, time() - 1, '/');
    session_destroy();
    if ($redirect = true) {
        header('Location: login.php');
    }
}
