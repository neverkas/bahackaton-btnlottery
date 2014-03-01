<html>

<head>

<title></title>

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
                        $("#resultado").html(response);
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

</head>

<body>

Resultado: <span id="resultado"></span>

</body>

</html>
