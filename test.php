<?php 

define('AUTH_SALT','=BYMLF7-On.<;fn-@^tMGY;JW!j+.HjN|YUW{R+kRv|gwu 3k>(SLVl-E[<|e7}s');

// Hashage du mot de passe dans la base de données avec la clé SALT
function hashPassword($pw){
	return sha1(AUTH_SALT.md5($pw.AUTH_SALT).sha1(AUTH_SALT));
}

$pw = "one";
echo hashPassword($pw);

 ?>