<?php 

include ("../config.php");

/* Mise à jour de l'image du profil depuis la page profil.php 
 */

/* URL_IMAGE
 *
 * Sources : profil.php
 * Actions : Mise à jours de l'image de l'utilisateur (URL_IMAGE)
 * 
 * Si la variable est vide, alors ce champ n'est pas modifié.
 * C'est à dire que l'utilisateur a modifié juste un champ, mais pas celui-ci.
 */
if (strlen($_POST["url_image"]) >0) {

	/* Récuprération des variables */
	$mail = $_SESSION["mail"];
	$url_image = $_POST['url_image'];

	/* Préparation de la requête MySQL */
	$query = "UPDATE utilisateurs SET url_image=:url_image WHERE email=:mail";
	$prep_query = $mysql->prepare($query); 

	/* Chargement des variables en attribuant des valeurs aux variable de la requête */
	$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep_query->bindValue(':url_image', $url_image, PDO::PARAM_STR);

	/* Execution de la reqête dans la base de données */
	$prep_query->execute();

	/* Mise à jour de la variable $_SESSION */
	$_SESSION["url_image"] = $url_image;

	/* Fermeture propre de la requête et destruction du contenu de la variable $prep_query */
	$prep_query->closeCursor();
	$prep_query = NULL;
}

/* On redirige vers la page Profil.php */
header ("Location: ../../profil.php");

?>