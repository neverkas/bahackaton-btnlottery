<?php
require_once "Game.php";
$winner = Game::getWinningNumber();
//$response = $firebaseConn->get(date("YmdH"));
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


    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <script>
        function getData(){
//        var parametros = {
//               "valor1" : valor1,
//                "valor2" : valor2
//        };
            $.ajax({
//                data:  parametros,
                url:   'getData.php',
                type:  'post',
                beforeSend: function () {
                    //   $("#resultado").html("Refreshing, please wait...");
                },
                success:  function (response) {
                    var obj = JSON.parse(response);

                    var html = "";
                    var pozo = 0;
                    obj.forEach(function(value){
                        html += "<tr>";
                        html += "<td><a href='https://blockchain.info/address/"+value.address+"'>" + value.address + "</a></td>";
                        html += "<td><a href='https://blockchain.info/tx/"+value.txid+"'>" + value.txid + "</a></td>";
                        html += "<td>" + value.amount/100000000 + "</td>";
                        html += "<td>" + value.number + "</td>";
                        html += "</tr>";
                        pozo += value.amount;
                    });

                    pozo = pozo/100000000;

                    $("#totalpot").html(pozo.toFixed(4));
                    $("#lotterypot").html((pozo*0.4).toFixed(4));
                    $("#charity").html((pozo*0.5).toFixed(4));
                    $("#profit").html((pozo*0.1).toFixed(4));
                    $("#tablelist").html(html);
                }
            });
        }

        update();

        function update(){
            getData();
            //setTimeout(update, 15000); //15 SEGUNDOS
            //setTimeout(update, 150000); //15 minutos CAMBIAR A 5/10 SEGUNDOS
            setTimeout(update, 5000); //5 SEGUNDOS
        }

    </script>
    <style>
        .lottery-totals h3{
            font-size: 20px;
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
                        <div class="col-md-4">
                            <img src="https://blockchain.info/qr?data=bitcoin:1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw" style="width:100%" />
                            <h4><a href='https://blockchain.info/address/1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw'>1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw</a></h4>
                        </div>
                        <div class="col-md-8">
                            <h4 style="text-align:center">How to get your lottery Number</h4>
                            <div>
                                <p>1) Search the Tx# of the deposit you made.</p>
                                <p>2) Hash with CRC32 you Tx#</p>
                                <p>3) Get the absolute remaining of the Hash with two digits (  abs($hash % 100) )</p>
                                <p>4) This is your number for the lottery </p>
                            </div>
                            <div>
                                <h3>Yesterday number: <?php echo $winner["number"] ?></h3>
                                <h3 style="font-size:16px">Yesterday block: <a href="https://blockchain.info/block/<?php echo $winner["hash"] ?>"><?php echo $winner["hash"] ?></a></h3>
                                <h3>The Winners of yesterday: </h3>
                                <table class="table table-list-search">
                                    <thead>
                                    <tr>
                                        <th>Tx</th>
                                        <th>Wallet</th>
                                        <th>Amount</th>
                                        <th>Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="font-size:12px;">
                                        <td><a href='https://blockchain.info/address/1Kc6W44Ng71M1STK211xyCUyy5UDy5HqXf'>1Kc6W44Ng71M1STK211xyCUyy5UDy5HqXf</a></td>
                                        <td><a href='https://blockchain.info/tx/c02c8e889b3a941c76f8ab6d299bd37f8274e3aa196ed0a09d487b8a1375d108'>c02c8e889b3a941c76f8ab6d299bd37f8274e3aa196ed0a09d487b8a1375d108</a></td>
                                        <td>0.001</td>
                                        <td>99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row lottery-totals">
                        <div class="col-md-3">
                            <h3 style="color: green;">Jackpot: <span id="totalpot" style="color: red; font-weigth: bold;"></span> BTC</h3>
                        </div>
                        <div class="col-md-3">
                            <h3 style="color: green;">Lottery Jackpot: <span id="lotterypot" style="color: red; font-weigth: bold;"></span> BTC</h3>
                        </div>
                        <div class="col-md-3">
                            <h3 style="color: green;">Charity: <span id="charity" style="color: red; font-weigth: bold;"></span> BTC</h3>
                        </div>
                        <div class="col-md-3">
                            <h3 style="color: green;">Profit: <span id="profit" style="color: red; font-weigth: bold;"></span> BTC</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <table class="table table-list-search">
                                <thead>
                                <tr>
                                    <th>Wallet</th>
                                    <th>Tx</th>
                                    <th>Amount</th>
                                    <th>Number</th>
                                </tr>
                                </thead>
                                <?php
                                /*                            foreach($bets as $bet){
                                                                echo "<tr>";
                                                                foreach($bet as $value){
                                                                    echo "<th>" . $value . "</th>";
                                                                }
                                                                echo "</tr>";
                                                            }*/
                                ?>
                                <tbody id='tablelist'>
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
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
