<?php
// var_dump($_POST);
// exit;


if(!$_POST || empty($_POST))
{
    header('Location: ./index.php');
}
$payment_id = $_POST['payment_id'];
$merchant_order_id = $_POST['merchant_order_id'];

$status = $_POST['payment_status'];

switch ($status) {
    case 'approved':
        header('Location: ./success.php?payment_id=' . $payment_id . '&' . 'merchant_order_id=' . $merchant_order_id);
        break;
    case 'pending':
        header('Location: ./pending.php?payment_id=' . $payment_id . '&' . 'merchant_order_id=' . $merchant_order_id);
        break;
    case 'error':
        header('Location: ./error.php?payment_id=' . $payment_id . '&' . 'merchant_order_id=' . $merchant_order_id);
        break;
    default:
        # code...
        break;
}