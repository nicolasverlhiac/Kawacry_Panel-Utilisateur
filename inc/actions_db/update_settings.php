<?php 

include ("../config.php");

/* Mise à jour des informations du compte depuis la page settings.php 
 */

/* MAIL 
 *
 * Sources : settings.php
 * Actions : Mise à jours de l'identifiant de connexion du compte (MAIL)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 */

if (strlen($_POST["mail"]) >0) {

	$mail = $_SESSION["mail"];
	$new_mail =  $_POST["mail"];

	$query = "UPDATE utilisateurs SET email=:new_mail WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':new_mail', $new_mail, PDO::PARAM_STR);

	$prep_query->execute();

	$_SESSION["mail"] = $new_mail;

	$prep_query->closeCursor();
	$prep_query = NULL;

	header ("Location: ../settings.php");
}

/* PASSWORD
 *
 * Sources : settings.php
 * Actions : Mise à jours du mot de passe du compte (PASSWORD)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 */

if (strlen($_POST["password"]) >0) {

	$mail = $_SESSION["mail"];
	$password = hashPassword($_POST['password']);

	$query = "UPDATE utilisateurs SET password=:password WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':password', $password, PDO::PARAM_STR);

	$prep_query->execute();

	$_SESSION["motdepasse"] = $password;

	$prep_query->closeCursor();
	$prep_query = NULL;

	header ("Location: ../settings.php");
}

?>