<?php
   session_start();
  if(!isset($_SESSION['u_mail'])){
   $_SESSION['last_page'] = 'cos.php';
   header("Location:../Pages/loginPage.php");
 }

 if(isset($_POST['posttotal']))
 {
  $_SESSION['total'] = $_POST['posttotal'];
 }


 $email=$_SESSION['u_mail'];
$servername ="localhost";
 $username="root";
 $password="";
 $dbname="carmag";
 $conn = mysqli_connect($servername, $username, $password,$dbname);

 if($conn){
  $sql="SELECT * from utilizatori where mail='$email'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result)){
       $name=$row['Nume'];
       $prenume=$row['Prenume'];
       $telefon=$row["Numar_Telefon"];
       $mail=$row['Mail'];
       $varsta=$row['Varsta'];
       $judet=$row['Judet'];
       $localitate=$row['Localitate'];
       $adresa=$row['Adresa'];
    }
  }
 }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <title>Sumar Comanda</title>
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

  <a class="linky" href="../index.php">Home<i class="right"></i></a>
  <a  class="linky" href="cos.php">Cos de cumparaturi<i class="right"></i></a>
  <a  class="linky" href="sumarComanda.php">Plasare Comanda</a>
  <span style="margin-left:26%; visibility: hidden;" id="informtext"> Text </span>

  <div class="rowPresent">
    <div class="columnPresent">
      <h3 style="margin-left:35%;">Sumar Comanda</h1>
      <p style="margin-left: 5%">Pret:<span style="margin-left:30%;"><?php echo $_SESSION['total'] ?> </span> euro</p>
      <p style="margin-left: 5%">Cost livrare: <span style="margin-left:22%; color: green;">GRATUIT</span></p>
      <h3 style="margin-left:35%;">Adresa de livrare</h1>
      <form style="margin-top: 1%;">
        <label id="judetlab" for="judet">Judet*</label>
        <input type="text" id="judet" name="judet" value="<?php echo $judet ?>">
        <label id="localitatelab" for="localitate">Localitate/ Sector*</label>
        <input type="text" id="localitate" name="localitate" value="<?php echo $localitate ?>">
        <label id="adresalab" for="adresa">Adresa</label>
        <input type="text" id="adresa" name="adresa" value="<?php echo $adresa ?>">
        <button type="button" onclick="validareAdresa();" class="button button5">Salveaza</button>
      </form>
    </div>

    <div class="columnPresent">
      <img style="margin-top: -1%;" class="visa" src="../Images/visa.png"/>

      <form style="margin-top: 1%;">
        <label id="numarlab" for="numar">Numar Card</label>
        <input type="text" id="numar" name="numar">
        <label id="numelab" for="nume">Nume Detinator</label>
        <input type="text" id="nume" name="nume">
        <label id="ccvlab" for="ccv">CCV</label>
        <input type="text" id="ccv" name="ccv">
      </form>
    </div>

    <button style="margin-right: -5%;" type="button" onclick="plateste();" class="button button5">Plateste</button>


  </div>


<script type="text/javascript">

  function validareAdresa(){
      document.getElementById("judetlab").style.color = "black";
      document.getElementById("localitatelab").style.color = "black";
      document.getElementById("adresalab").style.color = "black";

      var judet = document.getElementById("judet").value;
      var localitate = document.getElementById("localitate").value;
      var adresa = document.getElementById("adresa").value;
       var err=0;

      var result = judet.match(/^[a-zA-Z]+$/);
      if(result == null)
      {
        document.getElementById("judetlab").style.color = "red";
        document.getElementById("judetlab").title = "Introduceti un judet";
        err=1;
      }

      var result = localitate.match(/^[a-zA-Z]+$/);
      if(result == null)
      {
        document.getElementById("localitatelab").style.color = "red";
        document.getElementById("localitatelab").title = "Introduceti o localiate";
        err=1;
      }

       if(err == 0)
      {
        what="address";
        $.ajax({
          type: 'POST',
          url: '../Php/changedetails.php',
          data : {postwhat: what, postjudet: judet, postloc: localitate, postad: adresa},
          success:function(response)
          {
          }
        });
      }


    }


    function plateste(){
      document.getElementById("informtext").style.visibility = "hidden";
      document.getElementById("numarlab").style.color = "black";
      document.getElementById("numelab").style.color = "black";
      document.getElementById("ccvlab").style.color = "black";

      document.getElementById("judetlab").style.color = "black";
      document.getElementById("localitatelab").style.color = "black";
      document.getElementById("adresalab").style.color = "black";

      var judet = document.getElementById("judet").value;
      var localitate = document.getElementById("localitate").value;
      var adresa = document.getElementById("adresa").value;



      var numar = document.getElementById("numar").value;
      var nume = document.getElementById("nume").value;
      var ccv = document.getElementById("ccv").value;

      var err = 0;

      if(numar == "")
      {
        document.getElementById("numarlab").style.color = "red";
        document.getElementById("numarlab").title = "Introduceti numarul cardului";
        err=1;
      }

      if(nume == "")
      {
        document.getElementById("numelab").style.color = "red";
        document.getElementById("numelab").title = "Introduceti numele detinatorului cardului";
        err=1;
      }

      if(ccv == "")
      {
        document.getElementById("ccvlab").style.color = "red";
        document.getElementById("ccvlab").title = "Introduceti CCV-ul asociat cardului";
        err=1;
      }

      if(judet == "")
      {
        document.getElementById("judetlab").style.color = "red";
        document.getElementById("judetlab").title = "Introduceti judetul unde va fi livrat";
        err=1;
      }

      if(localitate == "")
      {
        document.getElementById("localitatelab").style.color = "red";
        document.getElementById("localitatelab").title = "Introduceti localitatea unde va fi livrat";
        err=1;
      }

      if(adresa == "")
      {
        document.getElementById("adresalab").style.color = "red";
        document.getElementById("adresalab").title = "Introduceti adresa unde va fi livrat";
        err=1;
      }

      var total = <?php echo $_SESSION['total'] ?>;

      if(err == 0)
      {
        $.ajax({
          type: 'POST',
          url: '../Php/plateste.php',
          data : {postnumar: numar, postnume:nume, postccv: ccv, postjudet: judet, postloc: localitate, postadresa: adresa, posttotal: total},
          success:function(response)
          {
            if(response.includes("nume"))
            {
              document.getElementById("numelab").style.color = "red";
              document.getElementById("numelab").title = "Numele introdus nu corespunde cu cel de pe card";
            }

            if(response.includes("numar"))
            {
              document.getElementById("numarlab").style.color = "red";
              document.getElementById("numarlab").title = "Numarul cardului nu este corect";
            }

            if(response.includes("ccv"))
            {
              document.getElementById("ccvlab").style.color = "red";
              document.getElementById("ccvlab").title = "CCV-ul introdus nu corespunde cu cel de pe card";
            }

            if(response.includes("suma"))
            {
              document.getElementById("informtext").style.color = "red";
              document.getElementById("informtext").innerHTML = "Nu aveti fonduri suficiente!";
              document.getElementById("informtext").style.visibility = "visible";
            }

            if(response === "succes")
            {
              document.getElementById("informtext").style.color = "green";
              document.getElementById("informtext").innerHTML = "Tranzactia s-a efectuat cu succes!";
              document.getElementById("informtext").style.visibility = "visible";
              setTimeout(function(){
                window.location.href = "listPage.php";
              }, 1000);
            }
          }
        });
      }

    }

</script>


  </html>
