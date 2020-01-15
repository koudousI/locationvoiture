<?php include ('config.php') ?>
<?php
if (isset ($_POST['submit'])) 
{
	$bdd = connexion();
    $nom = strtoupper( $_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenoms']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['telephone']);
    $login = htmlspecialchars($_POST['login']);
    $pass = md5(htmlspecialchars($_POST['pass']));
    $cpass = md5(htmlspecialchars($_POST['rpass']));

        if($pass == $cpass){
            $req= $bdd ->query("select idClient from tclient where login = '$login'");
			$count =$req->rowCount ();
			if ($count==1) {
				echo '<script type="text/javascript">alert ( "Ce login est déjà utilisé")</script>';
			} 
			else
			{
			$req = $bdd->prepare('INSERT INTO tclient (nom,prenoms,adresse,sexe,email,telephone,login,pass) 		VALUES(:nom,:prenoms,:adresse,:sexe,:email,:telephone,:login,:pass)');
			$req->execute(array(
				'nom' => $nom,
				'prenoms' => $prenom,
				'adresse' => $adresse,
				'sexe' => $sexe,
				'email' => $email,
				'telephone' => $tel,
				'login' => $login,
				'pass' => $pass
			 	));
	    		session_start ();
				$_SESSION['login'] = $login;
			    header ('Location:apres_conn.php');    
		     }
		}
		else
		{
			echo '<script type="text/javascript">alert ( "Les mots de passe ne sont pas identiques ")</script>';
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
	
	<title>Car Express|inscription  </title>

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
					<li><a href="index.php">Accueil</a></li>
					<li class="active"><a href="e_inscription.php">Inscription / Connexion</a></li>
						<!-- <li><a href="admin_connect.php">Espace administrateur </a></li> -->
					
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
							<h3 class="thin text-center">Créer un compte</h3>
							<p class="text-center text-muted">Cliquer sur <a href="e_connect.php">connecter</a>, si vous avez déja un compte </p>
							<hr>

							<form method="post" action="e_inscription.php" >
								<div class="top-margin">
									<label style="margin-top:1.5%	">Nom : </label>
									<input type="text" name= "nom" autocomplete="off" class="form-control" required>
								</div>
                                <div class="top-margin">
									<label style="margin-top:1.5%	">Prenoms : </label>
									<input type="text" name="prenoms" autocomplete="off" class="form-control" required>
								</div>
                                <div class="top-margin">
									<label style="margin-top:1.5%	">Adrèsse : </label>
									<input type="text"  name="adresse" onKeyUp="verif_integer(this)"  class="form-control" required>
								</div>
                               <div class="col-md-5"></div>

									
                                    	<input type="radio"  value="M" name="sexe" checked  class="custom-control-input" align="right" /><span>Homme</span>
                                        <input type="radio" value="F" name="sexe"  class="custom-control-input" /><span>Femme</span>
                                        <input type="radio" value="I" name="sexe"  class="custom-control-input" /><span>Inconnu</span>
                                     
                                   
								</div>
                                <div class="top-margin">
									<label style="margin-top:1.5%	">Telephone : </label>
									<input type="text"  name="telephone" class="form-control" required>
								</div>
								<div class="top-margin">
									<label style="margin-top:1.5%	">Email Address : <span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control" required>
								</div>
								<div class="top-margin">
									<label style="margin-top:1.5%	">Login : <span class="text-danger">*</span></label>
									<input type="email" name="login" autocomplete="off" class="form-control" required>
								</div>
                                 <div class="top-margin">
									<label style="margin-top:1.5%	">Mot de passe : </label>
									<input type="password" name="pass" class="form-control" required>
								</div>
                                 <div class="top-margin">
									<label style="margin-top:1.5%	">Confirmer mot de passe : </label>
									<input type="password" name="rpass" class="form-control" required>
								</div>
								
								<hr>

								<div class="row">
									<div class="col-lg-8">
										                     
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-info" type="submit" name="submit">Inscription</button>
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
