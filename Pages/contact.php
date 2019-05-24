<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
    <link href="../CSS/contact.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

      <script type="text/javascript" src="../JavaScript/search.js"></script>
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
  <a  class="linky" href="contact.php">Contact</a>

  <div class="column-middle">
  	<h3>Adrese de contact</h3>
  	<hr/>
  	<p style="color:gray">Pentru orice nelamurire va rugam sa ne contactati la adresa de mai jos sau prin intermediul formularului.</p>
  	<div class="middle-in-column">

	  	<p class="fas fa-home">Adresa</p>
	  	<span style="margin-left: 20px;">Academia Tehnica Militara</span>
	  	<br>

	  	<p class="fas fa-phone">Telefon</p>
	  	<span style="margin-left: 20px;">0731332675</span>
	  	<br>

	  	<p class="fas fa-mail-bulk">E-mail</p>
	  	<span style="margin-left: 20px;">carmag2k19@gmail.com</span>
	  	<br>
  	</div>	
  	<hr/>

  </div>

  	<div class="rowPresent">
  		<div class="columnPresent">
    		<div id="map"></div>
    	</div>


    	<div class="columnPresent">
    		<p style="font-size: 40px; margin-left: 40%;">Scrie-ne<p>
	    	<form style="margin-top: 5%;">
	    		<p style="color:red; visibility: hidden;" id="info"></p>
		        <label id="numecont" for="nume">Nume</label>
		        <input type="text" id="nume" name="nume">
		        <label id="mailcont" for="mail">E-mail</label>
		        <input type="text" id="mail" name="mail">
		        <label id="subcont" for="subiect">Subiect</label>
		        <input type="text" id="subiect" name="subiect">
		        <label id="msgcont" for="mesaj">Mesajul tau</label>
		        <textarea type="text" id="mesaj" name="mesaj"></textarea>
		        <button type="button" class="button button5" onclick="sendFormular();">Trimite</button>
	    	</form>
    	</div>
    </div>

    <hr/>
 	<p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>


<script type="text/javascript">
	function sendFormular()
	{
		var nume = document.getElementById("nume").value;
		var mail = document.getElementById("mail").value;
		var subiect = document.getElementById("subiect").value;
		var mesaj = document.getElementById("mesaj").value;
		var err=0;

		if(nume == "")
		{
			err=1;
			document.getElementById("info").style.color = "red";
			document.getElementById("info").style.visibility = "visible";
            document.getElementById("info").innerHTML ="Introduceti numele";
		}

		if(mail == "")
		{
			err=1;
			document.getElementById("info").style.color = "red";
			document.getElementById("info").style.visibility = "visible";
            document.getElementById("info").innerHTML ="Introduceti un e-mail";
		}


		if(subiect == "")
		{
			err=1;
			document.getElementById("info").style.color = "red";
			document.getElementById("info").style.visibility = "visible";
            document.getElementById("info").innerHTML ="Introduceti un subiect";
		}


		if(mesaj == "")
		{
			err=1;
			document.getElementById("info").style.color = "red";
			document.getElementById("info").style.visibility = "visible";
            document.getElementById("info").innerHTML ="Introduceti un mesaj";
		}

		if(err == 0)
		{
		 $.ajax({
	        type: 'POST',
	        url: '../Php/sendcontact.php',
	        data : {postmail: mail, postnume: nume, postsubiect: subiect, postmesaj: mesaj },
	       	success:function(response)
	       	{
	       		if(response == "success")
	       		{
	       			document.getElementById("info").style.color = "green";
					document.getElementById("info").style.visibility = "visible";
            		document.getElementById("info").innerHTML ="Mesajul a fost trimis";

            		document.getElementById("nume").innerHTML="";
            		document.getElementById("mail").innerHTML="";
            		document.getElementById("subiect").innerHTML="";
            		document.getElementById("mesaj").innerHTML="";

	       		}
	       	}
	       });
		}

	}


// Initialize and add the map
	function initMap(){
	  // The location of ATM
	  var atm = {lat: 44.419989, lng: 26.087366};
	  // The map, centered at ATM
	  var map = new google.maps.Map(
	      document.getElementById('map'), {zoom: 17, center: atm});
	  // The marker, positioned at ATM
	  var marker = new google.maps.Marker({position: atm, map: map});
	  }
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZGe0AnP3eLwqWsK5P6AM6Et9b3TZCYDM&callback=initMap">
    </script>
  </html>