<?php include ('config.php') ?>
<?php
session_start ();
if (isset ($_SESSION['login'])) 
	{
		
	}else {
		header ('Location:admin_connect.php');
	}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title> Car Express|Administrateur </title>

	<link rel="shortcut icon" href="assets/images/logg.jpg">
	
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
				<a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Express</a> <img style="margin-top:-15%" src="assets/images/logg.jpg" alt="" width="40" height="40">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">

					<li class="active"><a href="back_office.php"> Gestion des voitures </a></li>
					<li><a href="modele.php">Modèles de Voitures</a></li>
					<li><a href="insert_mat.php">Gestion Location</a></li>
                    <li><a href="insert_admin.php">inscription admin</a></li>
                    <li ><a class="btn" name="dec" href="admin_deconnect.php">Deconnexion </a></li>

					</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	
	<!-- /Intro-->
		<br/><br/><br/>
	<!-- Highlights - jumbotron -->

	<div style=" background-image:url(assets/images/3.jpg); height:500px"  class="jumbotron top-space">
		<div  class="container">

			<div class="col-lg-4 text-left">
				<a href='insert_voiture.php'>
					<button class="btn btn-success" type="submit" name="submit" title="Ajouter une nouvelle voiture">+ Ajouter</button>
				</a>
	</div>

        <hr>
        <div >
			
			
				<center><h3 style="background-color: #9F89B1">Liste des voitures de l'agence</h3></center>
				<div class = "tab">
					<?php 
					$bdd = connexion ();
				$req = $bdd->query("SELECT immatriculation,couleur,marque,kilometrage,prixJournalier,disponibilite,libelle FROM  tvoiture,tmodele WHERE tvoiture.id_modele=tmodele.idModele ORDER BY prixJournalier DESC");


				echo '<table align="center" class="table table-hover table-dark">' ;
				echo '<tr scope="col"><center><th><strong>immatriculation</strong></th>
				<th><strong>couleur</strong></th>
				<th><strong>Marque</strong></th>
				<th><strong>Modèle</strong></th>
				<th><strong>kilometrage</strong></th>
				<th><strong>prix Journalier</strong></th>
				<th><strong>disponibilité</strong></th>
				<th><strong>Action</strong></th></center></tr>';

				$i=1;

				while ($donnees = $req-> fetch ()) {
					echo '<tr><center><td> ' .$donnees ['immatriculation']. '</td>
					<td> ' .$donnees ['couleur'].'</td>
					<td> ' .$donnees ['marque'].'</td>
					<td> ' .$donnees ['libelle'].'</td>
					<td> ' .$donnees ['kilometrage'].'</td>
					<td> ' .$donnees ['prixJournalier'].'</td>';

					if($donnees ['disponibilite']==1)
					echo '<td>Oui</td>';
					else
					echo '<td>Non</td>';




					echo '<form action="update_voiture.php" method="post">
					<input type="hidden" name="immatriculation'.$i.'" value="'.$donnees["immatriculation"].'">
					<input type="hidden" name="identifiant" value="'.$i.'">
					<td><input type="submit" class="btn btn-secondary" title="Modifier informations concernant cette voiture" value="Modifier"></td>
					</form></center></tr>';

					$i++;

				}
				echo '</table>';
				?> 
				</div>
			</section>
		</div>
       	
	</div>
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
