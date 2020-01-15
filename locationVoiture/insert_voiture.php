<?php include ('config.php') ?>
<?php
session_start ();
if (isset ($_SESSION['login'])) 
	{
		
	}else {
		header ('Location:admin_connect.php');
	}


?>

<?php
if (isset ($_POST['submit'])) 
{
	$bdd = connexion();
    $immatriculation = htmlspecialchars($_POST['immatriculation']);
    $couleur = htmlspecialchars($_POST['couleur']);
    $kilometrage = htmlspecialchars($_POST['kilometrage']);
    $prixjournalier = htmlspecialchars($_POST['prixjournalier']);
    $marque = htmlspecialchars($_POST['marque']);
   	$modele=  htmlspecialchars($_POST['modele']);

       
            $req= $bdd ->query("select immatriculation from tVoiture where immatriculation = '$immatriculation'");
			$count =$req->rowCount ();
			if ($count==1)
				echo '<script type="text/javascript">alert ( "Ce Numero immatriculation est déjà utilise")</script>'; 

			if($modele=="0")
			echo '<script type="text/javascript">alert ( "Veuillez selectionner un modele de voiture SVP")</script>';

else{
			
			$req = $bdd->prepare('INSERT INTO  tVoiture(immatriculation,couleur,marque,kilometrage,prixJournalier,disponibilite,id_modele) VALUES
				(:immatriculation,:couleur,:marque,:kilometrage,:prixjournalier,:disponibilite,:modele)');
			$req->execute(array(
				'immatriculation' => $immatriculation,
				'couleur' => $couleur,
				'marque' => $marque,
				'kilometrage' => $kilometrage,
				'prixjournalier' => $prixjournalier,
				'disponibilite' =>'1',
				'modele' => $modele
				
			 	));
			echo '<script type="text/javascript">alert ("Enregistrement effectue avec succes")</script>';
	    		
		     }
		
		 
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Car Express|Administrateur</title>

	<link rel="shortcut icon" href="assets/images/logg.jpg">
	
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
	<div  class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Express</a> <img style="margin-top:-15%" src="assets/images/logg.jpg" alt="" width="40" height="40">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">

					<li class="active"><a href="back_office.php"> Gestion des voitures </a></li>
					<li><a href="modele.php">Modeles de Voitures</a></li>
					<li><a href="insert_mat.php">Gestion Location</a></li>
                    <li ><a href="insert_admin.php">inscription admin</a></li>
                    <li ><a class="btn" name="dec" href="admin_deconnect.php">Deconnexion </a></li>

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
							<h3 class="thin text-center">Inserer une nouvelle voiture</h3>
							
							<hr>

							<form method="post" action="insert_voiture.php" >
								
								<div class="top-margin">
									<label style="margin-top:1.5%	">Immatriculation : <span class="text-danger">*</span></label>
									<input type="text" name= "immatriculation" class="form-control" autocomplete="off" required>
								</div>


                             <div class="top-margin">
									<label style="margin-top:1.5%	">Couleur : <span class="text-danger">*</span></label>
									<input type="text" name="couleur" class="form-control" autocomplete="off" required>
								</div> 


								 <div class="top-margin">
									<label style="margin-top:1.5%	">Kilometrage : <span class="text-danger">*</span></label>
									<input type="number" name="kilometrage" min="0" class="form-control" autocomplete="off" required>
								</div>

								<div class="top-margin">
									<label style="margin-top:1.5%	">Marque : <span class="text-danger">*</span></label>
									<input type="text" name="marque" class="form-control" autocomplete="off" required>
								</div>								 

								<div class="top-margin">
									<label style="margin-top:1.5%	">Prix Journalier: <span class="text-danger">*</span></label>
									 <input type="number" min="0" max="9999" name = "prixjournalier" class="form-control" autocomplete="off" class="form-control">
								</div>

							 	 <div class="top-margin">
                                <label style="margin-top:1.5%	">Modele : <span class="text-danger">*</span></label>
                                 <select name="modele" class="form-control">
                                 <option value="0">-- Selectionner --</option>
                        		 <?php
                                    $bdd=connexion();
                                    $query = $bdd->query('SELECT * FROM tmodele');

                                    while ($m = $query->fetch(PDO::FETCH_ASSOC)) {

                                        echo "
                                             <option value='".$m['idmodele']."'>". $m['libelle'] ." </option>

                                                         " ;} ?>     

                                </select>        
                            </div>              
                           
                               
								
	
								<hr>

								<div class="row">
									<div class="col-lg-8">
										                     
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-info" type="submit" name="submit">Enregistrer</button>
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
