<?php 

include ("../config.php");

$mail =  $_GET["mail"];
$password = $_GET["mdp"];

$query = "DELETE FROM utilisateurs WHERE email=:mail AND password=:password";
$prep_query = $mysql->prepare($query); 

$prep_query->bindValue(':mail', $mail, PDO::PARAM_STR);
$prep_query->bindValue(':password', $password, PDO::PARAM_STR);

$prep_query->execute();

header ("Location: logout.php");

?>