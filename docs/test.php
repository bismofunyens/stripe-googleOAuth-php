<?php
require_once('../vendor/autoload.php');
\Stripe\Stripe::setApiKey("sk_test_VLB7HvZbsn1BaIOloNyo1fAt");
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$full_name = $POST['full_name'];
$email = $POST['email'];
$orders = \Stripe\Order::create(array(
  "items" => array(
    array(
      "type" => "sku",
      "parent" => "sku_DAH34Zzn7MCId9"
    )
  ),
  "currency" => "usd",
  "shipping" => array(
    "name" => $full_name,
    "address" => array(
      "line1" => "1234 Main Street",
      "city" => "San Francisco",
      "state" => "CA",
      "country" => "US",
      "postal_code" => "94111"
    )
  ),
  "email" => $email
));
print_r($orders);

// $customer = \Stripe\Customer::create(array(
//   "email" => $email,
//   "source" => $token
// ));


?>