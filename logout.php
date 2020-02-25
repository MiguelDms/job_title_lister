<?php 

include_once 'config/init.php';

$user = new User;
/* $user = new lib\User; */

if (isset($_GET['logout'])) {

    unset($_SESSION['logged_in']);
    header('Location: index.php');
} else {
    header('Location: index.php');
}

die();