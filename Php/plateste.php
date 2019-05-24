<?php

session_start();
$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";

	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

$numar = mysqli_real_escape_string($conn, $_POST['postnumar']);
$nume = mysqli_real_escape_string($conn, $_POST['postnume']);
$ccv = mysqli_real_escape_string($conn, $_POST['postccv']);
$judet = mysqli_real_escape_string($conn, $_POST['postjudet']);
$localitate = mysqli_real_escape_string($conn, $_POST['postloc']);
$adresa = mysqli_real_escape_string($conn, $_POST['postadresa']);
$total = mysqli_real_escape_string($conn, $_POST['posttotal']);
$id = mysqli_real_escape_string($conn, $_SESSION['u_id'] );


$sql = "SELECT * from Carduri where Id_Detinator = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$error = 0;

if ($nume != $_SESSION['u_nume'])
{
	$error = 1;
	echo "nume";
}
if($numar != $row['NumarCard'])
{
	$error = 1;
	echo "numar";
}
if($ccv != $row['CCV']){
	$error = 1;
	echo "ccv";
}

if ($row['Suma'] < $_POST['posttotal']  && $error!=1)
{
	$error = 1;
	echo "suma";
}
$data = mysqli_real_escape_string($conn, date("Y/m/d"));

if($error == 0)
{
	$sql = "INSERT INTO plati (Id_utilizator,Suma, Judet, Localitate, Adresa, Data_Tranzactie) VALUES ('$id','$total','$judet', '$localitate', '$adresa','$data');";
	$result = mysqli_query($conn, $sql);

	$sql = "UPDATE Carduri set Suma = Suma - $total where Id_Detinator = '$id'";
	$result = mysqli_query($conn,$sql);

	$sql = "DELETE from cartitems where Id_utilizator= '$id'";
    $result = mysqli_query($conn,$sql);

	echo "succes";
}



?>
