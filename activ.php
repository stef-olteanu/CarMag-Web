<?php


$mail = $_POST['email'];
$nume = $_POST['nume'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass-repeat'];
$photo = $_FILES['photo'];


if(empty($mail) || empty($nume) || empty($pass) || empty($pass2) || empty($photo["name"])){
	echo("Toate campurile sunt obligatorii");

}else{
	$rez=preg_match("/^([a-zA-Z' ]+)$/",$nume);
	if(!$rez)
	{
		echo("Numele trebuie sa contina numai litere");
	}

	if(strlen($pass) < 8)
	{
		echo("Parola trebuie sa contina cel putin 8 caractere");
	}

	$rez=filter_var($mail, FILTER_VALIDATE_EMAIL);
	if(!$rez)
	{
		echo("Mail-ul nu respecta formatul user@domain.com");
	}

	if(($photo["type"]=="image/png") && ($photo["size"] <5000000)){
		move_uploaded_file($photo["tmp_name"],"upload\Olteanu\\".$photo["name"]);
	}
}

?>