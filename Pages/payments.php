<?php
  session_start();
  if($_SESSION['u_rank'] != 'admin'){
   header("Location:../Pages/404Error.php");
 }

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "carmag";

	$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

	$sql = "SELECT * FROM utilizatori";
	$result = mysqli_query($conn,$sql);

	if(isset($_POST['postiduser'])){
		$_SESSION['postiduser'] = $_POST['postiduser'];
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Istoric Plati Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
    <link href="../CSS/cos.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <script type="text/javascript" src="../JavaScript/search.js"></script>
     <link href="../CSS/search.css" rel="stylesheet" type="text/css">
     <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
     <link href="../CSS/sumarComanda.css" rel="stylesheet" type="text/css">
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  </head>

  <div class="container">
    <div class="topnav">
      <a href="../index.php">Home</a>
      <a href="listPage.php">Autoturisme</a>
      <a href="../index.php#descriere">Despre</a>
      <a href="contact.php">Contact</a>

      <a href="cos.php" class='fas fa-shopping-cart' style="float:right"></a>
      <a href="userDetailsPage.php" class="far fa-user"   style="float:right"></a>
      <a onclick="openSearch()" href="#button" class="fa fa-search"  style="float:right; color:black"></a>


        <div id="myOverlay" class="overlaySearch">
          <span class="closebtn" onclick="closeSearch()" title="Close Overlay">X</span>
          <div class="overlay-content">
            <form action="#">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><a class="fa fa-search"></a></button>
            </form>
          </div>
        </div>


    </div>
  </div>

  <a href="../index.php" target="_self">
    <img class="centerImg" src="../Images/logoblack.png" />
  </a>


  <hr/>

  <a class="linky" href="admin.php">Admin Section<i class="right"></i></a>
  <a  class="linky" href="payments.php">Istoric Plati Admin</a>

  <br/>

  <p style="margin-left:2%;">Alegeti utilizatorul pentru care doriti sa vedeti tranzactiile</p>

  <select style="margin-left: 10%;" id="users" onchange="onchange()">
  	<?php
  		while($row = mysqli_fetch_assoc($result)){
  			echo "<option value='".$row['Id_Utilizator']."'>".$row['Id_Utilizator'].".".$row['Nume']." ".$row["Prenume"]."</option>";
  		}
  	?>
	  <option value="toate">Toate</option>
  </select>
  <hr/>

  <div style="margin-left: 30%;" class="column-middle" >
  	<table>
  		<tr>
  		<th>Numar Tranzactie</th>
  		<th>Suma</th>
  		<th>Adresa de livrare</th>
  		<th>Data Tranzactiei</th>
  		</tr>

	<?php
			if(isset($_SESSION['postiduser'])){
				if($_SESSION['postiduser'] == "toate"){
					$sql = "SELECT * FROM Plati";
				}
				else
				{
					$id = mysqli_real_escape_string($conn, $_SESSION['postiduser']);
					$sql = "SELECT * FROM Plati where Id_Utilizator = '$id'";
				}



			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($_SESSION['postiduser'] == "toate")
			{
				echo "<h1>Afisare plati pentru toti utilizatorii </h1>";
			}else{
				echo "<h1>Afisare plati pentru id: ".$_SESSION['postiduser']."</h1>";
			}
			if($resultCheck > 0)
			{
		  		while($row = mysqli_fetch_assoc($result)){
		  		echo "<tr>
		  		<th>".$row['ID']."</th>
		  		<th>".$row['Suma']."</th>
		  		<th>".$row['Judet']." ".$row['Localitate']." ".$row['Adresa']."</th>
		  		<th>".$row['Data_Tranzactie']."</th>
		  		</tr>";
		  		}
	  		}
  		}

  	?>
  	</table>

  </div>


  <script type="text/javascript">
  	var selectElement = document.getElementById("users");
  	selectElement.onchange=function(){
  		$.ajax({
          type: 'POST',
          url: 'payments.php',
          data : {postiduser: selectElement.value},
          success:function(response)
          {
            window.location.href=window.location.href;
          }
        });
	};

  </script>


  </html>
