<?php
session_start();
require_once '../GoogleAPI/vendor/autoload.php';

if (!isset($_SESSION['access_token'])) {
  header('Location: login.php');
  exit();
}

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
      
        Account Info &middot; 
      
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
            <li>
              <a href="transactions.php" title="Order history" data-toggle="tooltip" data-placement="right" data-container="body">
                <span class="icon icon-text-document"></span>
                <small class="iconav-nav-label visible-xs-block">History</small>
              </a>
            </li>
            <li class="active">
          <a href="account.php" title="Signed in as <?php echo $_SESSION['givenName'] ?>" data-toggle="tooltip" data-placement="right" data-container="body">
            <img src="<?php echo $_SESSION['picture'] ?>" alt="" class="img-circle img-responsive">
            <small class="iconav-nav-label visible-xs-block"><?php echo $_SESSION['givenName']?></small>
          </a>
        </li>
        </div>
      </nav>
  <div class="container">
      
      <div class="col-sm-12 content">
        <div class="dashhead">
  <div class="dashhead-titles">
    <h6 class="dashhead-subtitle">Nutrigene</h6>
    <h2 class="dashhead-title">Account Info</h2>
  </div>

  <div class="dashhead-toolbar">
      <span class="dashhead-toolbar-divider hidden-xs"></span>
      <div class="btn-group dashhead-toolbar-item btn-group-thirds">
        <a href="logout.php"><button type="button" class="btn btn-danger-outline">Logout</button></a>
      </div>
    </div>
</div>
<div class="hr-divider">
  <h3 class="hr-divider-content hr-divider-heading">
    Google Account Info
  </h3>
</div>
<div class="statcard p-a-md text-center">
  <h3 class="statcard-number"><img style="width: 20%;" src="<?php echo $_SESSION['picture'] ?>"></h3>
  <br>
  <span class="statcard-desc">Google ID: <?php echo $_SESSION['id'] ?></span>
  <br>
  <span class="statcard-desc">Given Name: <?php echo $_SESSION['givenName'] ?> <?php echo $_SESSION['familyName'] ?></span>
  <br>
  <span class="statcard-desc">Email: <?php echo $_SESSION['email'] ?></span>
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