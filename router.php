<?php

if(!$_POST || empty($_POST))
{
    header('Location: ./index.php');
}

$status = $_POST['payment_status'];

switch ($status) {
    case 'approved':
        header('Location: ./success.php');
        break;
    case 'pending':
        header('Location: ./pending.php');
        break;
    case 'error':
        header('Location: ./error.php');
        break;
    default:
        # code...
        break;
}