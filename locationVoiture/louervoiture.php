<?php include ('config.php') ?>
 
<?php
session_start ();


$l= $_SESSION['login'];

if (isset ($_SESSION['login'])) 
	{
		
	}else {
		header ('Location:e_connect.php');
	}


	?>
	<?php
	if (!empty($_POST)) {
		
		
			$bdd = connexion();
			$immatriculation= htmlspecialchars($_POST['voiture']);
			//var_dump($immatriculation);
			//die("Zsazs");	
	        $datedeb = htmlspecialchars($_POST['datedeb']);

	       // var_dump($datedeb);
	        $nbjour =htmlspecialchars($_POST['nbjour']);
	        //var_dump($nbjour);

			;
	        
				
				//$req = $bdd->prepare('INSERT INTO treservation(id_immat, datdeb, nbjour) VALUES(:id_immat,:datedeb,:nbjour)');
				$req = $bdd->prepare("INSERT INTO treservation (id_immat, datdeb, nbjour) VALUES (:id_immat, :datdeb, :nbjour)");
							

	$result = $req->execute(array(
		 'id_immat' => $immatriculation,
		 'datdeb' => $datedeb,
		 'nbjour' => $nbjour
		 // 'id_client' => $id_client,
		
	 	));


	    echo '<script type="text/javascript">alert ( "Enregistrement effectué avec succès")</script>';
				       
	} 

	

	?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Car Express|Louer Voiture  </title>

	<link rel="shortcut icon" href="assets/images/logo.jpg">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
<br/>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div style="" class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Express</a> <img style="margin-top:-15%" src="assets/images/log.jpg" alt="" width="40" height="40">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="nosvoiture.php"> Nos Voitures </a></li>
					<li class ="active"><a href="louervoiture.php">Louer une voiture </a></li>
					<li><a href="contact.php">Contatez nous</a></li>
                    <li ><a class="btn" name="dec" href="e_deconnect.php">Deconnexion </a></li>
					</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<br/><br/><br/><br/>

	<!-- container -->
	<div class="container">

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<br/>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sélectionner une voiture</h3>
							
							<hr>

						<form method="post" name = "f1" >
                           

							<div class="top-margin">
	                            <label style="margin-top:1.5%	" >Choisir une date debut</label>
	                            <input type="date" class="form-control"name="datedeb"/>
							</div>

                            <div class="top-margin">
	                            <label style="margin-top:1.5%	" >Entrer le nombre de jour</label>
	                            <input type="number"  class="form-control" name="nbjour"/>
							</div>




							 <div class="top-margin">
                                <label style="margin-top:1.5%	">Voiture : </label>
                                <select name="voiture" id="" class="form-control">
                                    <?php
                                    $bdd=connexion();
                                    // $query = $bdd->query('SELECT * FROM tVoiture RIGHT JOIN tmodele ON tVoiture.id_modele = tmodele.idmodele LEFT JOIN tclient ON tclient.idClient = tfacturation.id_client');

                                    $query = $bdd->query('SELECT * FROM tVoiture, tmodele where tVoiture.id_modele = tmodele.idmodele');

                                    while ($a = $query->fetch(PDO::FETCH_ASSOC)) {

                                        echo "
                                             <option value='".$a['immatriculation']."'>". $a['marque'] ." ".$a['couleur']." ". $a['prixJournalier'] ." ". $a['libelle'] ."</option> " ;}
                                    ?>
                                </select>
                            </div>


                            <hr>

                            <div class="row">
                                <div class="col-lg-8"> </div>
	                            <div class="col-lg-4 text-right">
	                                <button class="btn btn-info" type="submit" name="submit">Valider</button>
	                            </div>
                            </div>
                        </form>
                            
						</div>
					</div>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
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
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
