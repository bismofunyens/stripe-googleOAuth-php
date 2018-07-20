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
      
        Icon nav &middot; 
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    
    
    <link href="assets/css/application.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

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
  



<div class="with-iconav">

  <nav class="iconav">
    <a class="iconav-brand" href="index.php">
      <span class="icon icon-leaf iconav-brand-icon"></span>
    </a>
    <div class="iconav-slider">
      <ul class="nav nav-pills iconav-nav">
      <li class="active">
          <a href="index.php" title="Icon-nav layout" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="icon icon-home"></span>
            <small class="iconav-nav-label visible-xs-block">Icon nav</small>
          </a>
        </li>
        <li >
          <a href="http://wesleymok.ca/nutrigene-task/docs/transactions.php" title="Order history" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="icon icon-text-document"></span>
            <small class="iconav-nav-label visible-xs-block">History</small>
          </a>
        </li>
        <li>
        <a href="http://wesleymok.ca/nutrigene-task/docs/account.php" title="Signed in as <?php echo $_SESSION['givenName'] ?>" data-toggle="tooltip" data-placement="right" data-container="body">
            <img src="<?php echo $_SESSION['picture'] ?>" alt="" class="img-circle img-responsive">
            <small class="iconav-nav-label visible-xs-block"><?php echo $_SESSION['givenName']?></small>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="dashhead">
      <div class="dashhead-titles">
        <h6 class="dashhead-subtitle">Nutrigene</h6>
        <h3 class="dashhead-title">Vitamin Overview: <br><br> Veronica Connelly</h3>
      </div>

      <div class="dashhead-toolbar">
          <div class="btn-group dashhead-toolbar-item btn-group-thirds">
              <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#exampleModal">Load Credit</button>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Credit Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <form action="./charge.php" method="post" id="payment-form">
                          <div class="form-row">
                            <input type="text" name="full_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full name">
                            <!-- <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last name"> -->
                            <input type="text" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email">
                            <div id="card-element">
                              <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            </div>
                            
                          <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-primary">Submit</button>
                  
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <span class="dashhead-toolbar-divider hidden-xs"></span>
        <div class="btn-group dashhead-toolbar-item btn-group-thirds">
          <a href="logout.php"><button type="button" class="btn btn-danger-outline">Logout</button></a>
        </div>
      </div>
    </div>
    <ul class="nav nav-bordered m-t m-b-0" role="tablist">
      <li class="active" role="presentation">
        <a href="#vitaminScore" role="tab" data-toggle="tab" aria-controls="support">Vitamin Score</a>
      </li>
    </ul>

    <hr class="m-t-0 m-b-lg">

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="vitaminScore">
        <div class="ex-line-graphs m-b-md">
          <canvas
            class="ex-line-graph"
            width="700" height="600"
            data-chart="bar"
            data-scale-line-color="transparent"
            data-scale-grid-line-color="rgba(255,255,255,.05)"
            data-scale-font-color="#a2a2a2"
            data-labels="['Vitamin B12','Iron','Ketone','Molybdenium','N-acetyle cycteine','Omega 3']"
            data-value="[{ label: 'First dataset', data: [42.85, 100, 0, 50, 57.14, 50] }]">
          </canvas>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="h202">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','H202','']"
              data-value="[{ label: 'First dataset', data: [,0,] }]">
            </canvas>
          </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="iron">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Iron','']"
              data-value="[{ label: 'First dataset', data: [,100,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="ketone">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Keytone','']"
              data-value="[{ label: 'First dataset', data: [,0,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="citrate">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Moleybdenum','']"
              data-value="[{ label: 'First dataset', data: [,50,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="cycteine">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','N-acetyl cycteine','']"
              data-value="[{ label: 'First dataset', data: [,57.14,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="omega3">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Omega 3','']"
              data-value="[{ label: 'First dataset', data: [,50,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="phosphatidylcholine">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Phosphatidylcholine','']"
              data-value="[{ label: 'First dataset', data: [,100,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="retinol">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Retinol','']"
              data-value="[{ label: 'First dataset', data: [,66.66,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="fattyAcids">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Unsaturated fatty acids','']"
              data-value="[{ label: 'First dataset', data: [,100,] }]">
            </canvas>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="vitaminb12">
          <div class="ex-line-graphs m-b-md">
            <canvas
              class="ex-line-graph"
              width="700" height="600"
              data-chart="bar"
              data-scale-line-color="transparent"
              data-scale-grid-line-color="rgba(255,255,255,.05)"
              data-scale-font-color="#a2a2a2"
              data-labels="['','Vitamin B12','']"
              data-value="[{ label: 'First dataset', data: [,42.85,] }]">
            </canvas>
          </div>
      </div>
    </div>
    <hr class="m-t-0 m-b-md">

    <div class="row">
        <div class="col-md-12 m-b-md">
          <div class="list-group">
            
              <a class="list-group-item" href="#vitaminScore" role="tab" data-toggle="tab" style="font-size: 25px;">Vitamin Score</a>
            
            
              <a class="list-group-item" href="#h202" role="tab" data-toggle="tab" aria-controls="h202">
                <span class="list-group-progress" style="width: 0%;"></span>
                <span class="pull-right text-muted">0%</span>
                H202
              </a>
            
              <a class="list-group-item" href="#iron" role="tab" data-toggle="tab" aria-controls="iron">
                <span class="list-group-progress" style="width: 100%;"></span>
                <span class="pull-right text-muted">100%</span>
                Iron
              </a>
            
              <a class="list-group-item" href="#ketone" role="tab" data-toggle="tab" aria-controls="ketone">
                <span class="list-group-progress" style="width: 0%;"></span>
                <span class="pull-right text-muted">0%</span>
                Ketone
              </a>
            
              <a class="list-group-item" href="#citrate" role="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 50%;"></span>
                <span class="pull-right text-muted">50%</span>
                Molybdenum (Citrate)
              </a>
            
              <a class="list-group-item" href="#cycteine" role="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 57.14%;"></span>
                <span class="pull-right text-muted">57.14%</span>
                N-acetyl cycteine
              </a>
            
              <a class="list-group-item" href="#omega3" data="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 50%;"></span>
                <span class="pull-right text-muted">50%</span>
                Omega 3
              </a>
            
              <a class="list-group-item" href="#phosphatidylcholine" data="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 100%;"></span>
                <span class="pull-right text-muted">100%</span>
                Phosphatidylcholine
              </a>
            
              <a class="list-group-item" href="#retinol" data="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 66.66%;"></span>
                <span class="pull-right text-muted">66.66%</span>
                Retinol
              </a>
            
              <a class="list-group-item" href="#fattyAcids" data="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 100%;"></span>
                <span class="pull-right text-muted">100%</span>
                Unsaturated fatty acids
              </a>
            
              <a class="list-group-item" href="#vitaminb12" data="tab" data-toggle="tab">
                <span class="list-group-progress" style="width: 42.85%;"></span>
                <span class="pull-right text-muted">42.85%</span>
                Vitamin B12
              </a>
            
          </div>
          
        </div>
     
</div>
      

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/tablesorter.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="https://js.stripe.com/v3/"></script> 
    <script src="assets/js/charge.js"></script> 

    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

