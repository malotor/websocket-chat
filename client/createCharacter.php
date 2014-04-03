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
		    	<h2>Character creation</h2>
		    	<form class="form" role="form" action="./client.php" method="POST">


		    		<div class="form-group">
					    <label for="exampleInputFile">Your name</label>
					    <input type="text" class="form-control" id="" placeholder="Enter email" name="user_name">
					    <p class="help-block">Example block-level help text here.</p>
					  </div>

				  	<div class="form-group">
					    <label for="exampleInputFile">Character name</label>
					    <input type="text" class="form-control" id="" placeholder="Enter email" name="character_name">
					    <p class="help-block">Example block-level help text here.</p>
					  </div>
						<button type="submit" class="btn btn-default">Submit</button>

					</form>
		    </div>
  		</div>
		</div>
    
</html>


