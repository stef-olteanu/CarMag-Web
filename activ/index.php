<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="4">
<tr>
    <th>Nume</th>
  <th>Prenume</th>
  <th>Email</th>
  <th>Departament</th>
  <th>Sef Departament</th>
  <th>Facultate</th>
</tr>


<?php

	$servername ="localhost";
	$username="root";
	$password="";
	$dbname="angajatiatm";

	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if(!$conn){
		die("Eroare la conectare ".mysqli_connect_error());
	}

	$sql = "SELECT A.id, A.nume, A.email, D.Nume as Departament, D.Sef_Departament as SefDepartament, F.Nume as Facultate from angajati as A 
		inner join departamente as D
		 on D.ID=A.Id_departament 
		 inner join facultati as F
		  on F.ID=D.Id_Facultate";

	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		
		while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
		  echo '<td>'.$row['id'].'</td>';
		   echo '<td>'.$row['nume'].'</td>';
		   echo '<td>'.$row['email'].'</td>';
		     echo '<td>'.$row['Departament'].'</td>';
		     echo '<td>'.$row['SefDepartament'].'</td>';
		     echo '<td>'.$row['Facultate'].'</td>';
		 echo '</tr>';
				}
			}


        ?>
</table>
    </body>
</html>

