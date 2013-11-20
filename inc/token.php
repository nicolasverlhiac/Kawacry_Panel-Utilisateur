<?php
if (! (isset($_SESSION["token"]) && hashpassword($_SESSION["token_uncrypted"]) == $_SESSION["token"])) {
	header("Location: index.php");
	exit();
}
?>