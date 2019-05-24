<?php
session_start();

$message=$_POST['postmess'];
if($message == "logout")
{
	if(isset($_SESSION['u_mail'])){
		session_destroy();
		echo("success");
	}
}


?>