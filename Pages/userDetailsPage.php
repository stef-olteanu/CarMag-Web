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
    <title>Detalii Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
    <link href="../CSS/detaliiCont.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <script type="text/javascript" src="../JavaScript/search.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
     <link href="../CSS/search.css" rel="stylesheet" type="text/css">
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
  <a  class="linky" href="userDetailsPage.php">Detalii utilizator</a>
  <a class="linky" style="float:right; margin-right: 1%;cursor:pointer" onclick="execLogout()">Logout</a>
  <a class="linky" style="float:right; margin-right: 1%;cursor:pointer" onclick="toIstoric()">Istoric Plati</a>


  <div class="column-middle">
    <h1>Date de contact</h1>
    <h6>*Campurile marcate sunt obligatorii</h6>
    <h6>**Actualizeaza datele de contact/ <a href="#livrare" class="linky">detaliile de livrare</a> si <a href="#parola" class="linky">schimba-ti parola</a>.</h6>
    <hr/>
      <form>
        <label id="numelab" for="nume">Nume*</label>
        <input type="text" id="nume" name="nume" value="<?php echo $name ?>">
        <label id="prenumelab" for="prenume">Prenume*</label>
        <input type="text" id="prenume" name="prenume" value="<?php echo $prenume ?>">
        <label id="telefonlab" for="telefon">Numar de telefon*</label>
        <input type="text" id="telefon" name="telefon" value="<?php echo $telefon ?>">
        <label id="maillab"for="mail">E-mail*</label>
        <input type="text" id="mail" name="mail" value="<?php echo $mail ?>">
        <label id="varstalab" for="varsta">Varsta</label>
        <input type="text" id="varsta" name="varsta" value="<?php echo $varsta ?>">
        <button type="button" class="button button5" onclick="validareDetalii();">Salveaza</button>
      </form>
    <hr/>
    <h1 id="livrare">Detalii de livrare</h1>
    <h6>*Campurile marcate sunt obligatorii</h6>
    <hr/>
    <form>
      <label id="judetlab" for="judet">Judet*</label>
      <input type="text" id="judet" name="judet" value="<?php echo $judet ?>">
      <label id="localitatelab" for="localitate">Localitate/ Sector*</label>
      <input type="text" id="localitate" name="localitate" value="<?php echo $localitate ?>">
      <label id="adresalab" for="adresa">Adresa</label>
      <input type="text" id="adresa" name="adresa" value="<?php echo $adresa ?>">
      <button type="button" onclick="validareAdresa();" class="button button5">Salveaza</button>
    </form>

    <hr/>
    <h1 id="parola">Schimba parola</h1>
    <h6>*Campurile marcate sunt obligatorii</h6>
    <h6>**Parola trebuie sa contina cel putin o litera mica, o litera mare si o cifra</h6>
    <hr/>
    <form>
      <label id="lastlab" for="lastpass">Parola veche*</label>
      <input type="password" id="lastpass" name="lastpass">
      <label id="newlab" for="newpass">Parola noua*</label>
      <input type="password" id="newpass" name="newpass">
      <label id="newlab2" for="newpass2">Reintrodu parola noua*</label>
      <input type="password" id="newpass2" name="newpass2">
      <button type="button" onclick="validareParola();" class="button button5">Trimite</button>
    </form>
  </div>


  <hr/>
  <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>


  <script type="text/javascript">
    function validareDetalii()
    {
      document.getElementById("numelab").style.color = "black";
      document.getElementById("prenumelab").style.color = "black";
      document.getElementById("telefonlab").style.color = "black";
      document.getElementById("varstalab").style.color = "black";
      document.getElementById("maillab").style.color = "black";

      var nume = document.getElementById("nume").value;
      var prenume = document.getElementById("prenume").value;
      var telefon = document.getElementById("telefon").value;
      var varsta = document.getElementById("varsta").value;
      var mail = document.getElementById("mail").value;

      var err=0;
      var result = nume.match(/^[a-zA-z]+$/);
      if(result == null)
      {
        document.getElementById("numelab").style.color = "red";
        document.getElementById("numelab").title="Nu ati introdus nimic sau numele nu contine doar litere!";
        err=1;
      }
      var result = prenume.match(/^[a-zA-z]+$/);
      if(result == null)
      {
        document.getElementById("prenumelab").style.color = "red";
        document.getElementById("prenumelab").title="Nu ati introdus nimic sau prenumele nu contine doar litere!";
        err=1;
      }
      if(varsta < 18 || varsta > 75)
      {
      document.getElementById("varstalab").style.color="red";
      document.getElementById("varstalab").title="Varsta trebuie sa fie intre 18 si 75 de ani";
       err=1;
      }
      var result = telefon.match(/07[1-9]{8}$/);
      if(result == null)
      {
        document.getElementById("telefonlab").style.color="red";
        document.getElementById("telefonlab").title="Numarul de telefon nu a fost introdus sau nu respecta formatul 07xxxxxxxx";
        err=1;
      }
      result=mail.match(/[a-zA-z0-9._]+@[a-zA-z]+.com/);
      if(result == null)
      {
        document.getElementById("maillab").style.color="red";
        document.getElementById("maillab").title="Mailul trebuie sa respecte formatul user@domain.com/ro";
        err=1;
      }
      if(err == 0)
      {
        what="details";
        $.ajax({
          type: 'POST',
          url: '../Php/changedetails.php',
          data : {postwhat: what, postmail: mail, postname: nume, postpre: prenume, posttel: telefon, postvarsta: varsta },
          success:function(response)
          {
            if(response == "maildup")
            {
              document.getElementById("maillab").style.color="red";
              document.getElementById("maillab").title="E-mail-ul exista deja!";
            }

          }
        });
      }
    }


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




    function validareParola()
    {
      document.getElementById("lastlab").style.color = "black";
      document.getElementById("newlab").style.color = "black";
      document.getElementById("newlab2").style.color = "black";


      var lastpass  = document.getElementById("lastpass").value;
      var newpass = document.getElementById("newpass").value;
      var newpass2 = document.getElementById("newpass2").value;
      var result;
      err=0;
      result = lastpass.match(/.+/);
      if(result == null)
      {
        document.getElementById("lastlab").style.color = "red";
        document.getElementById("lastlab").title = "Parola veche trebuie sa aiba cel putin 8 caractere";
        err=1;
        /* Ramane aici de validat daca parola veche va coincide cu cea din baza de date */
      }

      if(newpass.length < 8)
      {
        document.getElementById("newlab").style.color = "red";
        document.getElementById("newlab").title = "Parola trebuie sa contina cel putin 8 caractere";
        err=1;
      }
      else {
        result = newpass.match(/[a-zA-Z]+/);
        if(result == null)
        {
          document.getElementById("newlab").style.color = "red";
          document.getElementById("newlab").title = "Parola trebuie sa contina cel putin o litera, o cifra si un caracter special";
          err=1;
        }
        else{
          result = newpass.match(/[0-9]+/);
          if(result == null)
          {
            document.getElementById("newlab").style.color = "red";
            document.getElementById("newlab").title = "Parola trebuie sa contina cel putin o litera, o cifra si un caracter special";
            err=1;
          }
            else {
              if( newpass != newpass2)
              {
                document.getElementById("newlab2").style.color = "red";
                document.getElementById("newlab2").title = "Parolele trebuie sa coincida";
                err=1;
              }
            }
          }
        }



      if(err == 0)
      {
        what="password";

        $.ajax({
          type: 'POST',
          url: '../Php/changedetails.php',
          data : {postwhat: what, postold: lastpass, postnew: newpass},
          success:function(response)
          {
            if(response == "bad")
            {

              document.getElementById("lastlab").style.color = "red";
              document.getElementById("lastlab").title = "Parola veche nu este corecta";
            }
            else
            {
              alert("Parola a fost schimbata");
            }

          }
        });
      }

    }

    function execLogout(){

      mess="logout";
      $.ajax({
          type: 'POST',
          url: '../Php/logout.php',
          data : {postmess: mess},
          success:function(response)
          {
            if(response == "success")
            {
              window.location.href = "loginPage.php";
            }
          }
        });
    }


    function toIstoric(){
      window.location.href = "istoricPlati.php";
    }



  </script>
  </html>
