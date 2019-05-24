<?php
  session_start();


?>

<!<!DOCTYPE html>
<html>
  <head>
    <title>CarMag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <link href="CSS/NavigationBanner.css" rel="stylesheet" type="text/css">
    <link href="CSS/ProductColumns.css" rel="stylesheet" type="text/css">
    <link href="CSS/ProductPresentation.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script type="text/javascript" src="JavaScript/search.js"></script>
     <link href="CSS/search.css" rel="stylesheet" type="text/css">
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  </head>


  <body>

  <div class="container"/>
  <div class="banner">
    <div class="container">
      <div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="Pages/listPage.php">Autoturisme</a>
        <a href="#descriere">Despre</a>
        <a href="Pages/contact.php">Contact</a>

        <a href="Pages/cos.php" class='fas fa-shopping-cart' style="float:right"></a>
        <a href="Pages/userDetailsPage.php" class="far fa-user"   style="float:right"></a>
        <a onclick="openSearch()" href="#button" class="fa fa-search"  style="float:right; color:white"></a>


        <div id="myOverlay" class="overlaySearch">
          <span class="closebtn" onclick="closeSearch()" title="Close Overlay">X</span>
          <div class="overlay-content">
            <form action="/action_page.php">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <a href="index.php" target="_self">
      <img class="centerImg" src="Images/logo.png" />
    </a>
    <a>
      <p class="welcomeEffect" style="color:white" id="welcome">Premium cars since 2019</p>
    </a>
    <a id="goup" class="fas fa-long-arrow-alt-up" href="index.php" style="color:black"></a>
  </div>

  <h1 align="center" id="descriere">O pasiune ce ne leaga</h1>
  <div align="center" >
    Totul a pornit de la pasiunea pentru autoturisme sport. Am pornit de la un vis si am ajuns la o
    <br>
    intreaga afacere cu masini. Asadar, oferim auto pentru toate gusturile, chiar si pentru cei, sa
    <br>
    zicem, mai pretentiosi. Pentru orice nelamurire nu ezita sa ne <a href="Pages/contact.php">contactezi</a>!
    <br>
    <p style="font-style:italic">"The cars we drive say a lot about us."</p>
  </div>

    <div class="row">

      <?php
         $servername = "localhost";
          $dBUsername = "root";
          $dBPassword = "";
          $dBName = "carmag";

          $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

           $sql = "SELECT * FROM autoturisme as A
                   inner join pozeauto as P
                   on A.ID=P.ID_Auto
                   ORDER BY A.ID DESC
                   LIMIT 6;";
          $result = mysqli_query($conn,$sql);

        $contor = 1;
        while($row = mysqli_fetch_assoc($result)){


          echo "<div style='margin-left:5%' class='containerProduse'>";
          echo '<img class="img-product" src="'.$row['Poza1'].'"
                onmouseover="this.src=\''.$row['Poza3'].'\';"
                onmouseout="this.src=\''.$row['Poza1'].'\';"/>';

          echo '<p class="title">'.$row['Marca'].' '.$row['Model'].'</p>
          <div class="overlay"></div>
          <div class="button"><a id='.$row['ID_Auto'].' onclick="gotoProd(this.id)">Vezi</a></div>
          </div>';



        }





      ?>


    </div>
    <hr/>
      <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>

  </body>

 <script type="text/javascript">

  function gotoProd(clicked_id)
      {
         $.ajax({
          type: 'POST',
          url: 'index.php',
          data : {postid: clicked_id},
          success:function(response)
          {
            window.location.href="Pages/prodPage.php";
          }
        });

         <?php
         if (!empty($_POST['postid']))
          {
               $_SESSION['clicked_id']=$_POST['postid'];
          }

         ?>

      }

    </script>
</html>
