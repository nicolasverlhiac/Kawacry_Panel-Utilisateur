<?php
// ** Destruction de la sessions de l'utilisateur **//
session_start (); 

/** On détruit les variables de notre session */
$_SESSION = array();
session_unset ();  

/** On détruit notre session */
session_destroy ();

/** On redirige le visiteur vers la page d'accueil */
header ('location: ../index.php');  
exit();
?> 

