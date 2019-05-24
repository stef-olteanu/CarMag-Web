<?php
  session_start();
  if($_SESSION['u_rank'] != 'admin'){
   header("Location:../Pages/404Error.php");
 }

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin Section</title>
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
  <a  class="linky" href="payments.php">Istoric Plati Site</a>


  <h1>Adauga un produs</h1>
    <h6>*Campurile marcate sunt obligatorii</h6>
    <hr/>
      <form>
        <label id="marcalab" for="marca">Marca*</label>
        <input type="text" id="marca" name="marca">
        <label id="modellab" for="model">Model*</label>
        <input type="text" id="model" name="model">
        <label id="pretlab" for="pret">Pret*</label>
        <input type="text" id="pret" name="pret">
        <label id="anlab"for="an">An Fabricatie*</label>
        <input type="text" id="an" name="an">
        <label id="kmlab" for="km">Kilometri*</label>
        <input type="text" id="km" name="km" >
        <label id="caroserielab" for="caroserie">Caroserie*</label>
        <input type="text" id="caroserie" name="caroserie" >
        <label id="capacitatelab" for="capacitate">Capacitate Cilindrica*</label>
        <input type="text" id="capacitate" name="capacitate" >
        <label id="puterelab" for="putere">Putere*</label>
        <input type="text" id="putere" name="putere" >
        <label id="cutielab" for="cutie">Cutie de viteze*</label>
        <input type="text" id="cutie" name="cutie" >
        <label id="transmisielab" for="trasnmisie">Transmisie*</label>
        <input type="text" id="transmisie" name="transmisie" >
        <label id="poza1lab" for="poza1">Poza generala*</label>
        <input type="file" id="poza1" name="poza1" >
        <label id="poza2lab" for="poza2">Poza spate*</label>
        <input type="file" id="poza2" name="poza2" >
        <label id="poza3lab" for="poza3">Poza interior*</label>
        <input type="file" id="poza3" name="poza3" >
        <label id="poza4lab" for="poza4">Poza lateral*</label>
        <input type="file" id="poza4" name="poza4" >
        <button type="button" class="button button5" onclick="validareAuto();">Salveaza</button>
      </form>
    <hr/>

    <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>


    <script type="text/javascript">
      function validareAuto(){
        document.getElementById("marcalab").style.color = "black";
        document.getElementById("modellab").style.color = "black";
        document.getElementById("pretlab").style.color = "black";
        document.getElementById("anlab").style.color = "black";
        document.getElementById("kmlab").style.color = "black";
        document.getElementById("caroserielab").style.color = "black";
         document.getElementById("capacitatelab").style.color = "black";
        document.getElementById("puterelab").style.color = "black";
         document.getElementById("cutielab").style.color = "black";
        document.getElementById("transmisielab").style.color = "black";
         document.getElementById("poza1lab").style.color = "black";
        document.getElementById("poza2lab").style.color = "black";
         document.getElementById("poza3lab").style.color = "black";
        document.getElementById("poza4lab").style.color = "black";



      var marca = document.getElementById("marca").value;
      var model = document.getElementById("model").value;
      var pret = document.getElementById("pret").value;
      var an = document.getElementById("an").value;
      var km = document.getElementById("km").value;
      var caroserie = document.getElementById("caroserie").value;
      var capacitate = document.getElementById("capacitate").value;
      var putere = document.getElementById("putere").value;
      var cutie = document.getElementById("cutie").value;
      var transmisie = document.getElementById("transmisie").value;
      var poza1 = document.getElementById("poza1").value;
      var poza2 = document.getElementById("poza2").value;
      var poza3 = document.getElementById("poza3").value;
      var poza4 = document.getElementById("poza4").value;

      err=0;
      if(marca === "")
      {
        document.getElementById("marcalab").style.color = "red";
        document.getElementById("marcalab").title="Introduceti marca masinii";
        err=1;
      }

      if(model === "")
      {
        document.getElementById("modellab").style.color = "red";
        document.getElementById("modellab").title="Introduceti modelul masinii";
        err=1;
      }

      if(pret === "")
      {
        document.getElementById("pretlab").style.color = "red";
        document.getElementById("pretlab").title="Introduceti pretul masinii";
        err=1;
      }

      if(an === "")
      {
        document.getElementById("anlab").style.color = "red";
        document.getElementById("anlab").title="Introduceti anul masinii";
        err=1;
      }

      if(km === "")
      {
        document.getElementById("kmlab").style.color = "red";
        document.getElementById("kmlab").title="Introduceti kilometrii masinii";
        err=1;
      }

      if(caroserie === "")
      {
        document.getElementById("caroserielab").style.color = "red";
        document.getElementById("caroserielab").title="Introduceti caroseria masinii";
        err=1;
      }

      if(capacitate === "")
      {
        document.getElementById("capacitatelab").style.color = "red";
        document.getElementById("capacitatelab").title="Introduceti capacitatea masinii";
        err=1;
      }

      if(putere === "")
      {
        document.getElementById("puterelab").style.color = "red";
        document.getElementById("puterelab").title="Introduceti puterea masinii";
        err=1;
      }


      if(cutie === "")
      {
        document.getElementById("cutielab").style.color = "red";
        document.getElementById("cutielab").title="Introduceti cutia masinii";
        err=1;
      }

      if(transmisie === "")
      {
        document.getElementById("transmisielab").style.color = "red";
        document.getElementById("transmisielab").title="Introduceti transmisie masinii";
        err=1;
      }


      if(poza1 === "")
      {
        document.getElementById("poza1lab").style.color = "red";
        document.getElementById("poza1lab").title="Introduceti poza generala a masinii";
        err=1;
      }


      if(poza2 === "")
      {
        document.getElementById("poza2lab").style.color = "red";
        document.getElementById("poza2lab").title="Introduceti poza spate a masinii";
        err=1;
      }

       if(poza3 === "")
      {
        document.getElementById("poza3lab").style.color = "red";
        document.getElementById("poza3lab").title="Introduceti poza interior a masinii";
        err=1;
      }


       if(poza4 === "")
      {
        document.getElementById("poza4lab").style.color = "red";
        document.getElementById("poza4lab").title="Introduceti poza lateral a masinii";
        err=1;
      }


      if(err == 0)
      {
        var path = "../Images/";

        var poza1 = poza1.substring(poza1.lastIndexOf('\\')+1);
        poza1=path.concat(poza1);

        var poza2 = poza2.substring(poza2.lastIndexOf('\\')+1);
        poza2=path.concat(poza2);

        var poza3 = poza3.substring(poza3.lastIndexOf('\\')+1);
        poza3=path.concat(poza3);

        var poza4 = poza4.substring(poza4.lastIndexOf('\\')+1);
        poza4=path.concat(poza4);

        $.ajax({
          type: 'POST',
          url: '../Php/addauto.php',
          data : {postmarca: marca, postmodel: model,postpret: pret ,postan: an, postkm: km,postcaroserie: caroserie,postcapacitate: capacitate, postputere: putere,postcutie: cutie, posttransmisie: transmisie, postpoza1: poza1,postpoza2: poza2,postpoza3: poza3,postpoza4: poza4},
          success:function(response)
          {
            if(response == "success")
            {
              document.getElementById("marcalab").style.color = "green";
              document.getElementById("modellab").style.color = "green";
              document.getElementById("pretlab").style.color = "green";
              document.getElementById("anlab").style.color = "green";
              document.getElementById("kmlab").style.color = "green";
              document.getElementById("caroserielab").style.color = "green";
               document.getElementById("capacitatelab").style.color = "green";
              document.getElementById("puterelab").style.color = "green";
               document.getElementById("cutielab").style.color = "green";
              document.getElementById("transmisielab").style.color = "green";
               document.getElementById("poza1lab").style.color = "green";
              document.getElementById("poza2lab").style.color = "green";
               document.getElementById("poza3lab").style.color = "green";
              document.getElementById("poza4lab").style.color = "green";
            }
          }
        });
      }




      }
    </script>

    </html>
