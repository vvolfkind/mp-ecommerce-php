<?php

require __DIR__ .  '/vendor/autoload.php';

$token = "APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398";


var_dump($_POST, $_GET);
$content = json_encode($_POST);
file_put_contents('log', $content);

//    MercadoPago\SDK::setAccessToken($token);

//     switch($_POST["type"]) {
//         case "payment":
//             $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
//             break;
//         case "plan":
//             $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
//             break;
//         case "subscription":
//             $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
//             break;
//         case "invoice":
//             $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
//             break;
//     }