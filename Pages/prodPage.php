<?php
  session_start();

  $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "carmag";

  $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

  $id = mysqli_real_escape_string($conn, $_SESSION['clicked_id']);

  $sql = "SELECT * FROM `autoturisme` as A
                inner join pozeauto as P
                on A.ID=P.ID_Auto
                where ID_Auto='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  $id = $row['ID_Auto'];
  $marca = $row['Marca'];
  $model = $row['Model'];
  $pret = $row['Pret'];
  $an = $row['An_Fabricatie'];
  $km = $row['Kilometri'];
  $caroserie = $row['Caroserie'];
  $capacitate = $row['Capacitate_Cilindrica'];
  $putere = $row['Putere'];
  $cutie = $row['Cutie_Viteze'];
  $transmisie = $row['Transmisie'];
  $stoc = $row['Stoc'];
  $poza1 = $row['Poza1'];
  $poza2 = $row['Poza2'];
  $poza3 = $row['Poza3'];
  $poza4 = $row['Poza4'];

?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $marca." ".$model ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
    <link href="../CSS/ProductPhotoGallery.css" rel="stylesheet" type="text/css">
    <script src="../JavaScript/PhotoGallery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <a  class="linky" href="listPage.php">Autoturisme<i class="right"></i></a>
  <a  class="linky" href="prodPage.php"><?php echo $marca." ".$model ?></a>

  <!-- The grid: four columns -->
  <div class="rowPresent">
    <div class="columnPresent">
      <div class="rowGallery">
        <div class="columnGallery">
          <img src="<?php echo $poza1 ?>" style="width:100%" onclick="expandGallery(this);">
        </div>
        <div class="columnGallery">
          <img src="<?php echo $poza2 ?>"" style="width:100%" onclick="expandGallery(this);">
        </div>
        <div class="columnGallery">
          <img src="<?php echo $poza3 ?>"" style="width:100%" onclick="expandGallery(this);">
        </div>
        <div class="columnGallery">
          <img src="<?php echo $poza4 ?>"" style="width:100%" onclick="expandGallery(this);">
        </div>
      </div>

      <!-- The expanding image container -->
      <div class="containerGallery">
        <img src="<?php echo $poza1 ?>" id="expandedImg" style="width:100%">
      </div>
    </div>

    <div class="columnPresent">
      <h1 class="title"><?php echo $marca." ".$model ?></h1>
      <br>
      <h3 class="title"><?php echo $pret?> euro</h3>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <p class="title">
        <?php if($stoc == 0){
          echo "Stoc epuizat. Disponibil in stoc furnizor!";
      }
      else
      {
        echo "Disponibil";
      }
       ?></p>


      <button id="<?php echo $id ?>" class="blockButton" onclick="addtoBasket(this.id)">Cumpara</button>

      <br>
      <hr/>
      <div class="centerIt">
        <a href="https://www.facebook.com/Steffanutz" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/stefaan.o/" class="fa fa-instagram"></a>
        <a href="https://www.linkedin.com/in/stefan-olteanu-6aba45157/" class="fa fa-linkedin"></a>
      </div>
      <hr/>
      <p class="title" href="#">All rights reserved</p>
    </div>
  </div>

  <hr/>

  <h2 style="margin-left:25%">Detalii despre autoturism</h2>

  <table>
    <tr>
      <th>Marca</th>
      <td><?php echo $marca ?></td>
    </tr>
    <tr>
      <th>Model</th>
      <td><?php echo $model ?></td>
    </tr>
    <tr>
      <th>Anul Fabricatiei</th>
      <td><?php echo $an ?></td>
    </tr>
    <tr>
      <th>Kilometri</th>
      <td><?php echo $km ?></td>
    </tr>

    <tr>
      <th>Caroserie</th>
      <td><?php echo $caroserie ?></td>
    </tr>

    <tr>
      <th>Capacitate Cilindrica</th>
      <td><?php echo $capacitate ?> cm3</td>
    </tr>

    <tr>
      <th>Putere</th>
      <td><?php echo $putere ?> CP</td>
    </tr>

    <tr>
      <th>Cutia de viteze/ Transmisie</th>
      <td><?php echo $cutie ?>/ <?php echo $transmisie ?></td>
    </tr>
  </table>

  <hr/>

  <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>

  <script type="text/javascript">
    function addtoBasket(clicked_id)
    {
      $.ajax({
          type: 'POST',
          url: 'prodPage.php',
          data : {postid: clicked_id},
          success:function(response)
          {
            window.location.href="cos.php";
          }
        });

      <?php
        if (!empty($_POST))
          {
              $idprodus = mysqli_real_escape_string($conn, $_POST['postid']);
              $idutilizator = mysqli_real_escape_string($conn, $_SESSION['u_id']);
              $sql = "INSERT INTO cartitems(ID_utilizator,ID_produs,Cantitate) values ('$idutilizator','$idprodus',1);";
              $result = mysqli_query($conn,$sql);

          }

          ?>
    }

  </script>


</html>
