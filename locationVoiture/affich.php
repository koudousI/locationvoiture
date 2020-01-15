<?php include ('config.php') ?>
<?php
session_start ();
if (isset ($_SESSION['login'])) 
	{
		$immat=htmlspecialchars($_POST['immat']);
		$couleur=htmlspecialchars($_POST['couleur']);

		$newCouleur = htmlspecialchars($_POST['couleur']);

	$bdd=connexion();
	$tab=$bdd->prepare('UPDATE tvoiture SET couleur="'.$newCouleur.'" WHERE immatriculation=?');
	$tab->execute(array($immat));
		
	echo '<script type="text/javascript">alert ( "Modification effectue avec succes")</script>';
	header ('Location:back_office.php');
		
	}else {
		header ('Location:admin_connect.php');
	}




?>