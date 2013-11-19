<?php
include ("config.php");

$mail = ($_POST['mail']);
$password = hashPassword($_POST['password']);
$nom = ($_POST['nom']);
$prenom = ($_POST['prenom']);

$query = "INSERT INTO utilisateurs (email, password, nom, prenom) VALUES (:mail, :password, :nom, :prenom );";
$prep = $mysql->prepare($query);

$prep->bindValue(':mail', $mail, PDO::PARAM_STR);
$prep->bindValue(':password', $password , PDO::PARAM_STR);
$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
$prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$prep->execute();

header ("location: ../profil.php");
?>