<?php 

include ("../config.php");

/* Mise à jour des informations de profil depuis la page profil.php 
 */

/* NOM
 *
 * Sources : profil.php
 * Actions : Mise à jours du nom de l'utilisateur (NOM)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 */
if (strlen($_POST["nom"]) >0) {

	$mail = $_SESSION["mail"];
	$nom = $_POST['nom'];

	$query = "UPDATE utilisateurs SET nom=:nom WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':nom', $nom, PDO::PARAM_STR);

	$prep_query->execute();

	$_SESSION["nom"] = $nom;

	$prep_query->closeCursor();
	$prep_query = NULL;
}

/* PRENOM
 *
 * Sources : profil.php
 * Actions : Mise à jours du prenom de l'utilisateur (PRENOM)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 */
if (strlen($_POST["prenom"]) >0) {

// Récuprération des variables
	$mail = $_SESSION["mail"];
	$prenom = $_POST['prenom'];

// Préparation de la requête MySQL
	$query = "UPDATE utilisateurs SET prenom=:prenom WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

// Chargement des variables en attribuant des valeurs aux variable de la requête
	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':prenom', $prenom, PDO::PARAM_STR);

// Execution de la requête dans la base de données
	$prep_query->execute();

// Mise à jour de la variable $_SESSION
	$_SESSION["prenom"] = $prenom;

// Fermeture propre de la requête et destruction du contenu de la variable $prep_query
	$prep_query->closeCursor();
	$prep_query = NULL;
}

/* URL_SITE
 *
 * Sources : profil.php
 * Actions : Mise à jours de l'url du site de l'utilisateur (URL_SITE)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 */
if (strlen($_POST["url_site"]) >0) {

	$mail = $_SESSION["mail"];
	$url_site = $_POST['url_site'];

	$query = "UPDATE utilisateurs SET url_site=:url_site WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':url_site', $url_site, PDO::PARAM_STR);

	$prep_query->execute();

	$_SESSION["url_site"] = $url_site;

	$prep_query->closeCursor();
	$prep_query = NULL;
}

header ("Location: ../profil.php");

?>