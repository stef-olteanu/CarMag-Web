<?php

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";

	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);


	$marca = mysqli_real_escape_string($conn, $_POST['postmarca']);
	$model = mysqli_real_escape_string($conn, $_POST['postmodel']);
	$pret = mysqli_real_escape_string($conn, $_POST['postpret']);
	$an = mysqli_real_escape_string($conn, $_POST['postan']);
	$km = mysqli_real_escape_string($conn, $_POST['postkm']);
	$caroserie = mysqli_real_escape_string($conn, $_POST['postcaroserie']);
	$capacitate = mysqli_real_escape_string($conn, $_POST['postcapacitate']);
	$putere = mysqli_real_escape_string($conn, $_POST['postputere']);
	$cutie = mysqli_real_escape_string($conn, $_POST['postcutie']);
	$transmisie = mysqli_real_escape_string($conn, $_POST['posttransmisie']);
	$poza1 = mysqli_real_escape_string($conn, $_POST['postpoza1']);
	$poza2 = mysqli_real_escape_string($conn, $_POST['postpoza2']);
	$poza3 = mysqli_real_escape_string($conn, $_POST['postpoza3']);
	$poza4 = mysqli_real_escape_string($conn, $_POST['postpoza4']);


	$sql = "INSERT into autoturisme(Marca,Model,Pret,An_Fabricatie,Kilometri,Caroserie,Capacitate_Cilindrica, Putere, Cutie_Viteze, Transmisie) values ('$marca','$model','$pret','$an','$km','$caroserie','$capacitate','$putere','$cutie','$transmisie');";

	$result = mysqli_query($conn,$sql);

	$sql = "SELECT * from autoturisme where 
			Marca='$marca' and
			Model='$model' and
			Pret='$pret' and
			An_Fabricatie='$an' and
			Kilometri='$km' and
			Caroserie='$caroserie' and
			Capacitate_Cilindrica='$capacitate' and
			Putere='$putere' and
			Cutie_Viteze='$cutie' and
			Transmisie='$transmisie';";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$id = $row['ID'];

	$sql = "INSERT into pozeauto(ID_AUTO,Poza1,Poza2,Poza3,Poza4) values ('$id','$poza1','$poza2','$poza3','$poza4');";
	$result = mysqli_query($conn,$sql);
	echo("success");