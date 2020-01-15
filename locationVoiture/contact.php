<?php include ('config.php') ?>
<?php
session_start ();

$l= $_SESSION['login'];

	if (isset ($_POST['submit']))
	{
		$bdd = connexion();
        $nom =  htmlspecialchars($_POST['nom']);
        $message = md5(htmlspecialchars($_POST['message']));
		
	$req = $bdd->prepare('INSERT INTO tcommentaire (nom,message) VALUES(:nom,:message)');
$req->execute(array(
	'nom' => $nom,
	'message' => $message
   		
 	));
	 echo '<script type="text/javascript">alert ( "Message enregistré avec succès")</script>';
		} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
<title> Car Express| Contatez-nous </title>

	<link rel="shortcut icon" href="assets/images/logg.jpg">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css"><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div  class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Epress</a> <img style="margin-top:-15%" src="assets/images/logg.jpg" alt="" width="40" height="40">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
				
					<li><a href="nosvoiture.php"> Nos Voitures </a></li>
					<li><a href="louervoiture.php">Louer une voiture </a></li>
					<li class ="active"><a href="contact.php">Contatez nous</a></li>
                    <li ><a class="btn" name="dec" href="e_deconnect.php">Deconnexion </a></li>
					</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
	<br/><br/><br/><br/><br/><br/>
	<header ></header>

	<!-- container -->
	<div class="container">

		

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez nous</h1>
				</header>
				
				<br>
					<form method="post"; action="contact.php">
						<div class="row">
							
							<div  class="col-sm-12">
								<input class="form-control" readonly name = "nom"type="text" 
                                <?php
                                    $bdd=connexion();
                                    $req = $bdd->query("SELECT * FROM tclient WHERE login='$l'");

                                    while ($a = $req->fetch(PDO::FETCH_ASSOC)) {

                                        echo "
                                            
											   value='".$a['nom']."  ".$a['prenoms']."'>

                                                         " ;} ?>
							</div>
                            
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Message" name="message" class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								
							</div>
							<div class="col-sm-6 text-right">
								<input class="btn btn-info" name="submit" type="submit" value="Envoyer">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
	<footer id="footer" class="top-space">

		<br/><br/><br/><br/>
	<section class="container-full top-space">
		<div id="map"></div>
	</section>
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
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="file:///C|/Users/ELVYSIO/Desktop/Progressus/assets/js/headroom.min.js"></script>
	<script src="file:///C|/Users/ELVYSIO/Desktop/Progressus/assets/js/jQuery.headroom.min.js"></script>
	<script src="file:///C|/Users/ELVYSIO/Desktop/Progressus/assets/js/template.js"></script>
	
	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="file:///C|/Users/ELVYSIO/Desktop/Progressus/assets/js/google-map.js"></script>
	

</body>
</html>