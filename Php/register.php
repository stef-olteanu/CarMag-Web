<?php

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";

	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

	$mail = mysqli_real_escape_string($conn, $_POST['postmail']);
	$pass = mysqli_real_escape_string($conn, $_POST['postpass']);
	$nume = mysqli_real_escape_string($conn, $_POST['postname']);
	$prenume = mysqli_real_escape_string($conn, $_POST['postpre']);
	$telefon = mysqli_real_escape_string($conn, $_POST['posttel']);

		$sql = "SELECT * FROM utilizatori where mail='$mail'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0)
		{
			echo("maildup");
			exit();
		}
		else
		{
			//hash parola
			$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
			//Insereaza utilizatorul in baza de date
			$sql = "INSERT INTO Utilizatori (Nume, Prenume, Varsta, Numar_Telefon, Judet, Localitate, Adresa, Mail, Parola) VALUES ('$nume','$prenume','0','$telefon','N/a','n/a','n/a','$mail','$hashedPwd');";
			$result = mysqli_query($conn,$sql);
			echo("success");
			exit();
		}

	?>
	