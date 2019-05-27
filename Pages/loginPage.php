<!<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/NavigationBanner.css" rel="stylesheet" type="text/css">
    <link href="../CSS/LoginForm.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script type="text/javascript" src="../JavaScript/fscreen.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="../JavaScript/search.js"></script>
     <link href="../CSS/search.css" rel="stylesheet" type="text/css">
  </head>

  <div class="container"/>
  <div class="banner">
    <div class="container">
      <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="listPage.php">Autoturisme</a>
        <a href="../index.php#descriere">Despre</a>
        <a href="contact.php">Contact</a>

        <a href="cos.php" class='fas fa-shopping-cart' style="float:right"></a>
        <a href="userDetailsPage.php" class="far fa-user"   style="float:right"></a>
        <a href="#button" class="fa fa-search"  style="float:right; color:white"></a>
      </div>
    </div>
    <a href="../index.php" target="_self">
      <img class="centerImg" src="../Images/logo.png" />
    </a>
    <a>
      <p class="welcomeEffect" style="color:white" id="welcome">Premium cars since 2019</p>
    </a>

    <input type="radio" checked  id="toggle--login" name="toggle" class="ghost" />
    <input type="radio"  id="toggle--signup" name="toggle" class="ghost" />
   <input type="radio"  id="toggle--reset" name="toggle" class="ghost" />

  <form class="form form--login framed">
    <p id="infolog" style="color:red; visibility: hidden;"></p>
    <input id="logmail" type="email" placeholder="E-mail" class="input input--top" />
    <input id="logpass" type="password" placeholder="Parola" class="input" />
    <input type="button" onclick="verifyLogin();" value="Log in" class="input input--submit" />

    <label for="toggle--signup" class="text text--small text--centered">New? <b>Sign up</b></label>
    <label for="toggle--reset" class="text text--small text--centered">Forgot Password? <b>Click here</b></label>
  </form>

  <form  class="form form--signup framed" autocomplete="off">
    <p id="info" style="color:red; visibility: hidden;"></p>
    <input id="mail" name="mail" type="text" placeholder="E-mail" class="input input--top" />
    <input id="password" name="pwd" type="password" placeholder="Parola" class="input" />
    <input id="password2" name="pwd2" type="password" placeholder="Repeta parola" class="input" />
    <input id="nume" name="nume" type="text" placeholder="Nume" class="input" />
    <input id="prenume" name="prenume" type="text" placeholder="Prenume" class="input" />
    <input id="telefon" name="telefon" type="text" placeholder="Numar de telefon" class="input" />
    <input type="button" onclick="verifyRegister();" name="register-submit" value="Sign up" class="input input--submit" />

    <label for="toggle--login" class="text text--small text--centered">Not new? <b>Log in</b></label>
  </form>

  <form class="form form--reset framed">
    <p id="inforeset" style="color:white;">Introduceti mail-ul pentru a primi o noua parola</p>
    <input id="mailreset" name="mailreset" type="text" placeholder="E-mail" class="input input--top" />
    <input type="button" onclick="sendpass();" name="pass-reset" value="Send Password" class="input input--submit" />

    <label for="toggle--login" class="text text--small text--centered">Remembered it? <b>Log in</b></label>
  </form>


  </div>


  <script type="text/javascript">

    function sendpass(){
      var mail = document.getElementById("mailreset").value;
      $.ajax({
        type: 'POST',
        url: '../Php/sendpass.php',
        data : {postmail: mail},
        success:function(response)
        {
          if(response == "mailnotexist")
          {
            document.getElementById("inforeset").style.color = "red";
            document.getElementById("inforeset").innerHTML ="E-mailul introdus nu exista";
          }
          if(response == "nothing")
          {
            document.getElementById("inforeset").style.color = "red";
            document.getElementById("inforeset").innerHTML ="Nu ati introdus un e-mail";
          }
          if(response == "success")
          {
            document.getElementById("inforeset").style.color = "green";
            document.getElementById("inforeset").innerHTML ="E-mailul a fost trimis. Veti fi redirectionat!";

            setTimeout(function(){
                window.location.href = "loginPage.php";
              }, 2000);
          }
        }
      });
    }


    function verifyLogin(){

      var mail = document.getElementById("logmail").value;
      var pass = document.getElementById("logpass").value;


      $.ajax({
          type: 'POST',
          url: '../Php/login.php',
          data : {postmail: mail, postpass: pass},
          success:function(response)
          {
            if(response.includes("success"))
            {
              var loc = response.substring(response.lastIndexOf('/')+1);
              window.location.href = loc;
            }
            if(response == "mailnotexist")
            {
              document.getElementById("infolog").style.visibility = "visible";
              document.getElementById("infolog").innerHTML ="E-mailul introdus nu exista";
            }
            if(response == "wrongpass")
            {
              document.getElementById("infolog").style.visibility = "visible";
              document.getElementById("infolog").innerHTML ="E-mailul si parola nu coincid";
            }
          }
        });

    }


    function verifyRegister(){
      var mail = document.getElementById("mail").value;
      var pass = document.getElementById("password").value;
      var pass2 = document.getElementById("password2").value;
      var nume = document.getElementById("nume").value;
      var prenume = document.getElementById("prenume").value;
      var telefon = document.getElementById("telefon").value;
      document.getElementById("info").style.visibility = "hidden";

      var err=0;

      result=mail.match(/[a-zA-z0-9._]+@[a-zA-z]+.com/);
      if(result == null)
      {
        document.getElementById("info").style.visibility = "visible";
        document.getElementById("info").innerHTML = "Introduceti un e-mail cu formatul user@domain.com";
        err=1;
      }

      if(pass.length < 8)
      {
        document.getElementById("info").style.visibility = "visible";
        document.getElementById("info").innerHTML = "Parola trebuie sa contina cel putin 8 caractere";
        err=1;
      }
      else {
        result = pass.match(/[a-zA-Z]+/);
        if(result == null)
        {
          document.getElementById("info").style.visibility = "visible";
          document.getElementById("info").innerHTML = "Parola trebuie sa contina cel putin o litera, o cifra si un caracter special";
          err=1;
        }
        else{
          result = pass.match(/[0-9]+/);
          if(result == null)
          {
            document.getElementById("info").style.visibility = "visible";
            document.getElementById("info").innerHTML = "Parola trebuie sa contina cel putin o litera, o cifra si un caracter special";
            err=1;
          }
            else {
              if( pass != pass2)
              {
                document.getElementById("info").style.visibility = "visible";
                document.getElementById("info").innerHTML = "Parolele trebuie sa coincida";
                err=1;
              }
            }
          }
        }


      var result = nume.match(/^[a-zA-z]+$/);
      if(result == null)
      {
        document.getElementById("info").style.visibility = "visible";
        document.getElementById("info").innerHTML ="Nu ati introdus nimic sau numele nu contine doar litere!";
        err=1;
      }
      var result = prenume.match(/^[a-zA-z]+$/);
      if(result == null)
      {
        document.getElementById("info").style.visibility = "visible";
        document.getElementById("info").innerHTML ="Nu ati introdus nimic sau prenumele nu contine doar litere!";
        err=1;
      }


      var result = telefon.match(/07[1-9]{8}$/);
      if(result == null)
      {
        document.getElementById("info").style.visibility = "visible";
        document.getElementById("info").innerHTML ="Numarul de telefon nu a fost introdus sau nu respecta formatul 07xxxxxxxx";
        err=1;
      }

      if(err == 0)
      {
        $.ajax({
          type: 'POST',
          url: '../Php/register.php',
          data : {postmail: mail, postpass: pass, postname: nume, postpre: prenume, posttel: telefon },
          success:function(response)
          {
            result = response.match(/maildup/);
            if(result != null)
            {

              document.getElementById("info").style.visibility = "visible";
              document.getElementById("info").innerHTML ="Exista deja un utilizator cu acelasi mail";
            }
            result = response.match(/success/);
            if(result != null)
            {
              document.getElementById("info").style.visibility = "visible";
              document.getElementById("info").style.color="green";
              document.getElementById("info").innerHTML ="V-ati inregistrat cu succes!";
              setTimeout(function(){
                window.location.href = "loginPage.php";
              }, 1000);
            }
          }
        });


      }

    }
  </script>

  </html>
