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
$password = ($_POST['password']);

// ** Vérification si l'utilisateur existe dans la base de données ** //

//Requète contenu dans la variable $query
$query = "SELECT*FROM Utilisateur WHERE email=:mail AND password=:password"; 
// Préparation de la requète dans la variable $check_query
$check_query = $mysql->prepare($query); 
$check = $check_query->execute(array(':mail'=>$mail, ':password'=>$password));

/* La variable $check_query contient un tableau avec la ligne du couple d'identifiants (mot de passe / mail).
 * Si il n'y a rien, alors mauvais couple
 */
if ($check_query->rowCount()==1) {
	session_start();
	$_SESSION["mail"] = $_POST["mail"]; 
	$_SESSION["motdepasse"] = $_POST["password"]; 
	$_SESSION["authentification"] = true;
	$_SESSION["token_uncrypted"] = uniqid();
	$_SESSION["token"] = hashpassword($_SESSION["token_uncrypted"]);
	header ("Location: ../admin.php");
	exit();

}else{
	die("Mauvais couple d'identifiants");
}
?>