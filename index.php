<?php

    require_once "Game.php";
    require_once "config.php";
    $bets = Game::getBets();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BTC Lottery</title>

    <!-- Bootstrap core CSS -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Custom styles for this template -->
      <style>
                  .main-container{
                      margin-top:75px;
                  }
      </style>
  </head>

  <body>
  <div id="wrap">
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-inverse navbar-fixed-top">
			 <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
						<li  class="active"><a href="http://127.0.0.1/btc4hope/public">Home</a></li>
					</ul>

                    <ul class="nav navbar-nav pull-right">
                                                <li ><a href="http://127.0.0.1/btc4hope/public/user/login">Login</a></li>
                        <li ><a href="http://127.0.0.1/btc4hope/public/user/create">Sign Up</a></li>
                                            </ul>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container main-container">
			<!-- Notifications -->
						<!-- ./ notifications -->

			<!-- Content -->
			<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://blockchain.info/qr?data=bitcoin:1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw" style="width:100%" />
                </div>
                <div class="col-md-9">
                    <h3>1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <form action="#" method="get">
                        <div class="input-group">
                            <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                            <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <table class="table table-list-search">
                        <thead>
                        <tr>
                            <th>Wallet</th>
                            <th>Tx</th>
                            <th>Amount</th>
                            <th>Confirmations</th>
                            <th>Number</th>
                        </tr>
                        </thead>
                        <tbody>
                                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container">
	        <p class="muted credit">Laravel 4 Starter Site on <a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site">Github</a>.</p>
	      </div>
	    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
  </body>
</html>
