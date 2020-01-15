<?php

	/* fonction connection a la base de donnée */

	function connexion(){
		try{
      	  $bdd = new PDO('mysql:host=localhost;dbname=locationdb;charset=utf8', 'root', 'root');
			return ($bdd);
		}
		catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
		}
	}
		
		
?>


