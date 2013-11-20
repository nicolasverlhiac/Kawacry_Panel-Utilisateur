<?php 

include ("config.php");

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

if (strlen($_POST["password"]) >0) {

	$mail = $_SESSION["mail"];
	$password = hashPassword($_POST['password']);

	$query = "UPDATE utilisateurs SET password=:password WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':password', $password, PDO::PARAM_STR);

	$prep_query->execute();
	$prep_query->closeCursor();
	$prep_query = NULL;

	header ("Location: ../settings.php");
}

?>