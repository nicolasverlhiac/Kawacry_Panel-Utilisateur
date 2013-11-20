<?php
include ("../config.php");

$mail = ($_POST['mail']);
$password = hashPassword($_POST['password']);
$nom = ($_POST['nom']);
$prenom = ($_POST['prenom']);
$url_image = "images/profil.png";
$url_site = "";

$query = "INSERT INTO utilisateurs (email, password, nom, prenom, url_image, url_site) VALUES (:mail, :password, :nom, :prenom, :url_image, :url_site );";
$prep = $mysql->prepare($query);

$prep->bindValue(':mail', $mail, PDO::PARAM_STR);
$prep->bindValue(':password', $password , PDO::PARAM_STR);
$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
$prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$prep->bindValue(':url_image', $url_image, PDO::PARAM_STR);
$prep->bindValue(':url_site', $url_site, PDO::PARAM_STR);
$prep->execute();

$_SESSION["mail"] = $mail; 
$_SESSION["motdepasse"] = $password; 
$_SESSION["nom"] = $nom;
$_SESSION["prenom"] = $prenom;
$_SESSION["url_image"] = $url_image;
$_SESSION["url_site"] = $url_site;
$_SESSION["token_uncrypted"] = uniqid();
$_SESSION["token"] = hashpassword($_SESSION["token_uncrypted"]);

$prep->closeCursor();
$prep = NULL;
	
header ("location: ../profil.php");


?>