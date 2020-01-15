<?php include ('config.php') ?>
<?php
session_start ();
if (isset ($_SESSION['login'])) 
	{
		
	}else {
		header ('Location:e_connect.php');
	}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title> Car Express</title>

	<link rel="shortcut icon" href="assets/images/logo.jpg">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Express</a> <img style="margin-top:-15%" src="assets/images/log.jpg" alt="" width="40" height="40">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
				
					<li class="active"><a href="nosvoiture.php"> Nos voitures </a></li>
					<li><a href="louervoiture.php">Louer une voiture </a></li>
					<li><a href="contact.php">Contatez nous</a></li>
                    <li ><a class="btn" name="dec" href="e_deconnect.php">Deconnexion </a></li>
					</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	
	<!-- /Intro-->
		<br/><br/><br/>
	<!-- Highlights - jumbotron -->
	<div style=" background-image:url(assets/images/3.jpg); height:500px"   class="jumbotron top-space">
		<div  class="container">
        <hr>
        <div >
			<center><h3 style="background-color: #9F89B1 ">Nouvauté</h3></center>
				<p style=" text-align:justify">
				<?php 
					$bdd = connexion ();
				$req = $bdd->query("SELECT description FROM  tvoiture");
				echo '<table>' ;
				while ($donnees = $req-> fetch ()) {
					echo '<tr><center><td> ' .$donnees ['imagevoiture']. '</td></center></tr>';
				}
				echo '</table>';
				?>
		</div>
	</div>
	<!-- /Highlights -->

	<!-- container -->
	
	<footer id="footer" class="top-space">

		<br/><br/><br/><br/>
		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
                            Tel : (+33) 07-68-19-71-25 | E-mail : locationvoiture@gmail.com
								<p>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; Dec 2019, Koudous IBOURAIMA & Lassana MAKADJI 
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
