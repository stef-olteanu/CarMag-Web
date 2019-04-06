<?php
	session_start();


	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";

	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

	$mail = mysqli_real_escape_string($conn, $_POST['postmail']);
	$pass = mysqli_real_escape_string($conn, $_POST['postpass']);


	if(!empty($mail) || !empty($pass)){
		$sql = "SELECT * FROM utilizatori WHERE mail='$mail'";
		$result = mysqli_query($conn, $sql);
	 	$resultCheck = mysqli_num_rows($result);
	 	if($resultCheck < 1)
	 	{
	 		echo("mailnotexist");
	 	} else{
	 		if($row = mysqli_fetch_assoc($result)){
	 			$hashedPasscheck = password_verify($pass, $row['Parola']);
	 			if($hashedPasscheck == false)
	 			{
	 				echo("wrongpass");
	 			}
	 			elseif ($hashedPasscheck == true) {
	 				echo("success");
	 				$_SESSION['u_mail'] = $row['Mail'];
	 				$_SESSION['u_nume'] = $row['Nume'];
	 				$_SESSION['u_prenume'] = $row['Prenume'];
	 				$_SESSION['u_varsta'] = $row['Varsta'];
	 				$_SESSION['u_telefon'] = $row['Numar_Telefon'];
	 				$_SESSION['u_judet'] = $row['Judet'];
	 				$_SESSION['u_localitate'] = $row['Localitate'];
	 				$_SESSION['u_adresa'] = $row['Adresa'];
	 				exit();
	 			}
	 		}
	 	}



	}