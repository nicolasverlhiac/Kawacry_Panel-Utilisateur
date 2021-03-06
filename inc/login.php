<?php
include ("config.php");

if (!$_SERVER["REQUEST_METHOD"]=="POST") {
	die(include ("errors/access.php"));
}

if(strlen($_POST["mail"]) <=0 or strlen($_POST["password"]) <=0 ){
	die(include ("errors/erreurs.php"));
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
	$_SESSION["token_uncrypted"] = uniqid();
	$_SESSION["token"] = hashpassword($_SESSION["token_uncrypted"]);
	
	$check_query->closeCursor();
	$check_query = NULL;

	$query = "UPDATE utilisateurs SET last_login=:last_login WHERE email=:mail";
	$prep = $mysql->prepare($query);

	$prep->bindValue(':mail', $mail, PDO::PARAM_STR);
	$prep->bindValue(':last_login', date("y-m-d-h-i-s"), PDO::PARAM_STR);
	$prep->execute();

	$prep->closeCursor();
	$prep = NULL;

	header ("Location: ../profil.php");
	exit();



}else{
	die(include ("errors/id_faux.php"));
}
?>