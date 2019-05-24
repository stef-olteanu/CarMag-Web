<?php
	
	session_start();
	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";


	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

	$what = $_POST['postwhat'];
	
	if($what == "details"){
		$oldMail = mysqli_real_escape_string($conn, $_SESSION['u_mail']);
		$mail = mysqli_real_escape_string($conn, $_POST['postmail']);
		$nume = mysqli_real_escape_string($conn, $_POST['postname']);
		$prenume = mysqli_real_escape_string($conn, $_POST['postpre']);
		$telefon = mysqli_real_escape_string($conn, $_POST['posttel']);
		$varsta = mysqli_real_escape_string($conn, $_POST['postvarsta']);
		if($mail != $_SESSION['u_mail'])
		{
			$sql = "SELECT * FROM utilizatori where Mail='$mail'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0)
			{
				echo("maildup");
				exit();
			}
		}
		$sql = "UPDATE utilizatori
						set Mail='$mail',
						 Nume='$nume',
						 Prenume='$prenume',
						 Numar_Telefon='$telefon',
						 Varsta='$varsta'
						where Mail='$oldMail'";
		$result = mysqli_query($conn,$sql);
		$_SESSION['u_mail']=$mail;
		echo("success");
	}

	if($what == "address")
	{	
		$email = $_SESSION['u_mail'];
		$judet = mysqli_real_escape_string($conn, $_POST['postjudet']);
		$localitate = mysqli_real_escape_string($conn, $_POST['postloc']);
		$adresa = mysqli_real_escape_string($conn, $_POST['postad']);
		$sql = "UPDATE utilizatori
						set Judet='$judet',
						 Localitate='$localitate',
						 Adresa='$adresa'
						where Mail='$email'";
		$result = mysqli_query($conn,$sql);

	}

	if($what == "password")
	{
		$old = mysqli_real_escape_string($conn, $_POST['postold']);
		$new = mysqli_real_escape_string($conn, $_POST['postnew']);
		$hashedPwdOld = password_hash($old, PASSWORD_DEFAULT);
		$hashedPwdNew = password_hash($new, PASSWORD_DEFAULT);
		$email = $_SESSION['u_mail'];

		$sql = "SELECT * FROM utilizatori where Mail='$email'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0)
		{
			while($row = mysqli_fetch_assoc($result)){
				$hashedPasscheck = password_verify($old, $row['Parola']);
				if($hashedPasscheck == false)
	 			{
	 				echo("bad");
	 				exit();
	 			}
			}
		}

		$sql = "UPDATE utilizatori set Parola='$hashedPwdNew' WHERE mail='$email'";
        mysqli_query($conn,$sql);

	}