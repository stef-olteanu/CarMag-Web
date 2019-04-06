<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "Utilizatori";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Conexiunea a esuat: ".mysqli_connect_error());
}
