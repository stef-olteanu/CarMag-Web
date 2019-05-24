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
			$sql = "INSERT INTO utilizatori (Nume, Prenume, Varsta, Numar_Telefon, Judet, Localitate, Adresa, Mail, Parola, Rank) VALUES ('$nume','$prenume','0','$telefon','N/a','n/a','n/a','$mail','$hashedPwd','client');";
			$result = mysqli_query($conn,$sql);

			$sql = "SELECT * FROM utilizatori where mail='$mail'";
			$cardNumber = mt_rand(100000, 999999);
			$ccv = mt_rand(100,999);
			$suma = 500000;

			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$id = $row['Id_Utilizator'];
			$sql = "INSERT INTO carduri(Id_Detinator, NumarCard, CCV, Suma) VALUES ('$id','$cardNumber','$ccv','$suma');";
			$result = mysqli_query($conn,$sql);


			echo("success");
			exit();
		}

	?>
