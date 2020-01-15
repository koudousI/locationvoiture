<?php include ('config.php') ?>
<?php 

session_start ();
if (isset ($_GET['marque'])){
	$marque= (String) trim($_GET['marque']);
	$marque=$marque.'%';
	$bdd = connexion();
	$req=$bdd->prepare("SELECT DISTINCT marque FROM tVoiture WHERE marque LIKE ? LIMIT 3");
    $req->execute(array($marque));

	$req=$req->fetchAll();

	foreach ($req as $value) {

 echo "<div>".$value['marque']."</div>";


	}
}

?>

  