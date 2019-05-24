<?php
  session_start();
  if(!isset($_SESSION['u_mail'])){
   header("Location:../Pages/loginPage.php");
 }

$email=$_SESSION['u_mail'];
$servername ="localhost";
 $username="root";
 $password="";
 $dbname="carmag";

 $conn = mysqli_connect($servername, $username, $password,$dbname);
 $id = mysqli_real_escape_string($conn, $_SESSION['u_id']);

 $sql = "SELECT * from Plati where ID_utilizator = '$id'";
 $result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Istoric Plati</title>
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
            <form action="/action_page.php">
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

  <a class="linky" href="../index.php">Home<i class="right"></i></a>
  <a  class="linky" href="userDetailsPage.php">Detalii Cont<i class="right"></i></a>
  <a  class="linky" href="istoricPlati.php">Istoric Plati</a>

  <div class="column-middle" >
  <h1>Istoric Plati</h1>
  <table>
  	<tr>
  		<th>Numar Tranzactie</th>
  		<th>Suma</th>
  		<th>Adresa de livrare</th>
  		<th>Data Tranzactiei</th>
  	</tr>


  	<?php
  	while($row = mysqli_fetch_assoc($result)){
  		echo "<tr>
  		<th>".$row['ID']."</th>
  		<th>".$row['Suma']."</th>
  		<th>".$row['Judet']." ".$row['Localitate']." ".$row['Adresa']."</th>
  		<th>".$row['Data_Tranzactie']."</th>
  		</tr>";
  	}

  	?>
  </table>
	</div>

	</html>





