<?php
// ** Initialisation des paramètres de connexion à la base de données MySQL ** //
/** Nom de la base de données MySQL. */
define("SQL_DBASE","kawacry");

/** Utilisateur de la base de données MySQL. */
define("SQL_USER","root");

/** Mot de passe de la base de données MySQL. */
define("SQL_PASS","root");

/** Adresse de l'hébergement MySQL. */
define("SQL_HOST","localhost");

// ** Connexion à la base de données avec PDO ** //
try {
    $mysql = new PDO("mysql:dbname=".SQL_DBASE.";host=".SQL_HOST,SQL_USER,SQL_PASS);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	} catch (PDOException $e) {
        echo'Erreur : '.$e->getMessage();
	}

/* Grain de sable pour le cryptage des mots de passe
 *
 * Remplacez la valeur par défaut par une phrase unique !
 * Vous pouvez générer des phrases aléatoires en utilisant https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 */
define('AUTH_SALT','=BYMLF7-On.<;fn-@^tMGY;JW!j+.HjN|YUW{R+kRv|gwu 3k>(SLVl-E[<|e7}s');

// Hashage du mot de passe dans la base de données avec la clé SALT
function hashPassword($pw){
	return sha1(AUTH_SALT.md5($pw.AUTH_SALT).sha1(AUTH_SALT));
}

?>