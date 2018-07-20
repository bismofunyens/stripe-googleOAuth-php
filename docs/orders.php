<?php
session_start();
require_once '../GoogleAPI/vendor/autoload.php';

if (!isset($_SESSION['access_token'])) {
  header('Location: login.php');
  exit();
}
require_once('../config/db.php');
require_once('../lib/pdo_php.php');
// require_once('../models/Transactions.php');
require_once('../models/Orders.php');

$order = new Order();

$orders = $order->getOrder();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Order history &middot; 
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    
    
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>


<body>
    <nav class="iconav">
        <a class="iconav-brand" href="index.php">
          <span class="icon icon-leaf iconav-brand-icon"></span>
        </a>
        <div class="iconav-slider">
          <ul class="nav nav-pills iconav-nav">
          <li>
              <a href="index.php" title="Icon-nav layout" data-toggle="tooltip" data-placement="right" data-container="body">
                <span class="icon icon-home"></span>
                <small class="iconav-nav-label visible-xs-block">Icon nav</small>
              </a>
            </li>
            <li class="active">
              <a href="index.php" title="Order history" data-toggle="tooltip" data-placement="right" data-container="body">
                <span class="icon icon-text-document"></span>
                <small class="iconav-nav-label visible-xs-block">History</small>
              </a>
            </li>
            <li>
            <a href="#" title="Signed in as <?php echo $_SESSION['givenName'] ?>" data-toggle="tooltip" data-placement="right" data-container="body">
            <img src="<?php echo $_SESSION['picture'] ?>" alt="" class="img-circle img-responsive">
            <small class="iconav-nav-label visible-xs-block"><?php echo $_SESSION['givenName']?></small>
          </a>
            </li>
          </ul>
        </div>
      </nav>
  <div class="container">
      
      <div class="col-sm-12 content">
        <div class="dashhead">
  <div class="dashhead-titles">
    <h6 class="dashhead-subtitle">Nutrigene</h6>
    <h2 class="dashhead-title">Order History</h2>
  </div>

  <div class="dashhead-toolbar">
      <span class="dashhead-toolbar-divider hidden-xs"></span>
      <div class="btn-group dashhead-toolbar-item btn-group-thirds">
        <a href="logout.php"><button type="button" class="btn btn-danger-outline">Logout</button></a>
      </div>
    </div>
</div>
<div class="btn-group" role="group">
    <a href="orders.php" class="btn btn-primary active">Orders</a>
    <a href="transactions.php" class="btn btn-primary">Transactions</a>
</div>
<div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer Name</th>
          <th>Email</th>
          <th>Product</th>
          <th>Amount</th>
          <th>Order Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($orders as $o): ?>
        <tr>
          <td><?php echo $o->id;?></td>
          <td><?php echo $o->full_name;?></td>
          <td><?php echo $o->email;?></td>
          <td><?php echo $o->product;?></td>
          <td><?php echo sprintf('%.2f', $o->price / 100);?><?php echo strtoupper($o->currency);?></td>
          <td><?php echo $o->created_at;?></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
    </table>
  </div>
</div>

      </div>
    </div>
  </div>
</div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/tablesorter.min.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

