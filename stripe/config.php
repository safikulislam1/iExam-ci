<?php

include_once './vendor/autoload.php';
use Stripe\Stripe;



$Publishablekey ="pk_test_SJ35Wu6ohdPgSL1J3gN6FsJQ00XwHAVLbF";

$Secretkey ="sk_test_CII1qTd1Wdr4ddcZ9jYXrjyz00enu3cwr2";



\Stripe\Stripe::setApiKey($Secretkey);


?>
