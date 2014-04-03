<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Game Demo v0.1</title>

    <!-- Bootstrap core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/styles.css" rel="stylesheet">

    <script src="./assets/js/javascript.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="init()">
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-md-6">
		    	<h2>Chat</h2>
		    	<div class="panel panel-default">
					  <div id="log" class="panel-body">
					    
					  </div>
					</div>
		    	<form class="form-inline" role="form">

		    		<input id="user_name" type="hidden" value="<?=$_POST['user_name']?>">
						<input id="character_name" type="hidden" value="<?=$_POST['character_name']?>" >

				  	<div class="form-group">
					    <label class="sr-only" for="exampleInputEmail2">Email address</label>
					    <input type="text" class="form-control" id="msg" placeholder="Enter message" onkeypress="onkey(event)">
					  </div>

					  <button class="btn btn-default" onclick="send(); return false;">Send</button>
					  <button class="btn btn-default" onclick="quit(); return false;">Quit</button>
						<button class="btn btn-default" onclick="reconnect(); return false;">Reconnect</button>

					</form>
		    </div>
  			<div class="col-md-6">
  				<h2>Comandos</h2>

  				<h3>Move</h3>

		    	<form class="form-inline" role="form">
				  	<div class="form-group">
					    <label class="sr-only" for="">X</label>
					    <input type="text" class="form-control" id="posX" placeholder="X">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">Y</label>
					    <input type="text" class="form-control" id="posY" placeholder="Y" 
					  </div>
					  <button class="btn btn-default" onclick="move(); return false;">Move</button>
					</form>
				 </div>
		  </div>
		</div>
    
</html>


