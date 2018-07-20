<?php
  require_once('../vendor/autoload.php');
  require_once('../config/db.php');
  require_once('../lib/pdo_php.php');
  require_once('../models/Customers.php');
  require_once('../models/Transactions.php');
  require_once('../models/Orders.php');
  \Stripe\Stripe::setApiKey('sk_test_VLB7HvZbsn1BaIOloNyo1fAt');
 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
 $full_name = $POST['full_name'];
//  $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];
// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));
// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Nutrigene Credit",
  "customer" => $customer->id
));
// Create an Order
$orders = \Stripe\Order::create(array(
    "items" => array(
      array(
        "type" => "sku",
        "parent" => "sku_DAMykq2k4nSC90"
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

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'full_name' => $full_name,
//   'last_name' => $last_name,
  'email' => $email
];
// Instantiate Customer
$customer = new Customer();
// Add Customer To DB
$customer->addCustomer($customerData);
// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

$orderData = [
    'id' => $orders->id,
    'full_name' => $full_name,
    'email' => $email,
    'product' => $charge->description,
    'price' => $orders->amount
    
  ];

$orders = new Order();

$orders->addOrder($orderData);
// Instantiate Transaction
$transaction = new Transaction();
// Add Transaction To DB
$transaction->addTransaction($transactionData);



// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);