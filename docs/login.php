<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
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
      
        Login &middot; 
      
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
  <div class="container">
    <div class="row">
    <div class="hr-divider">
  <h3 class="hr-divider-content hr-divider-heading">
    Nutrigene User Login
  </h3>
</div>
      <div class="col-sm-12 content">
<div class="row statcards">
  <div class="col-sm-3 m-b">
  </div>
  <div class="col-sm-6 m-b">
      <a href="#" style="text-decoration: none;">
        <div class="statcard p-a-md text-center">
          <ul class="list-group">
            <li class="list-group-item"><input type="text" class="form-control" placeholder="Username"></li>
            <li class="list-group-item"><input type="text" class="form-control" placeholder="Password"></li>
          </ul>
          <button type="button" class="btn btn-primary-outline">Login</button>
          <button type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="btn btn-success-outline" id="login-button">Login with Google</button>
        </div>
      </a>
    </div>
    <div class="col-sm-3 m-b">
      </div>
</div>
      </div>
    </div>
  </div>

  <div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Example modal</h4>
      </div>
      <div class="modal-body">
        <p>You're looking at an example modal in the dashboard theme.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
      </div>
    </div>
  </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/tablesorter.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

