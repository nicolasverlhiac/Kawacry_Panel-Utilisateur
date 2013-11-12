<?php
// Initialisation des paramètres de connexion à la base de données
define("SQL_HOST","localhost");
define("SQL_USER","root");
define("SQL_PASS","root");
define("SQL_DBASE","kawacry");

// Connexion à la base de données avec PDO
try {
    $mysql = new PDO("mysql:dbname=".SQL_DBASE.";host=".SQL_HOST,SQL_USER,SQL_PASS);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e) {
        echo'Erreur : '.$e->getMessage();
}

// Clé de cryptage SALT à ne PAS modifier
// Si vous changez un caractère de cette clé, les mots de passe ne seront plus décryptable
define("SALT","<b}DKJ{]1QIcW<Kn|`ENm(w1|9>epVQvkhyEaN*dfJEA{MZ");

// Hashage du mot de passe dans la base de données avec la clé SALT
function hashPassword($p){
	return sha1(SALT.md5($p.SALT).sha1(SALT));
}

?>