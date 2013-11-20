<?php
include ("config.php");

if (!$_SERVER["REQUEST_METHOD"]=="POST") {
	die("Acces non autorisé");
}

if(strlen($_POST["mail"]) <=0 or strlen($_POST["password"]) <=0 ){
	die("Vous devez entrer un mail d'utilisateur et un mot de passe");
}

// ** Récupération des variables du formulaire de connexion ** //
$mail = ($_POST['mail']);
$password = hashPassword($_POST['password']);

// ** Vérification si l'utilisateur existe dans la base de données ** //

//Requète contenu dans la variable $query
$query = "SELECT*FROM utilisateurs WHERE email=:mail AND password=:password"; 
// Préparation de la requète dans la variable $check_query
$check_query = $mysql->prepare($query); 
$check = $check_query->execute(array(':mail'=>$mail, ':password'=>$password));
$userdata = $check_query->fetch();

/* La variable $check_query contient un tableau avec la ligne du couple d'identifiants (mot de passe / mail).
 * Si il n'y a rien, alors mauvais couple
 */
if ($check_query->rowCount()==1) {

	$_SESSION["mail"] = $mail; 
	$_SESSION["motdepasse"] = $password; 
	$_SESSION["nom"] = $userdata['nom'];
	$_SESSION["prenom"] = $userdata['prenom'];
	$_SESSION["url_image"] = $userdata['url_image'];
	$_SESSION["url_site"] = $userdata['url_site'];
	
	$check_query->closeCursor();
	$check_query = NULL;

	header ("Location: ../profil.php");
	exit();

	

}else{
	die("Mauvais couple d'identifiants");
}
?>