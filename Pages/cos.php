<?php
   session_start();
  if(!isset($_SESSION['u_mail'])){
   $_SESSION['last_page'] = 'cos.php';
   header("Location:../Pages/loginPage.php");
 }

 $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "carmag";

  $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

  $idutilizator = mysqli_real_escape_string($conn, $_SESSION['u_id']);


$sql = "SELECT * from cartitems as C inner join autoturisme as A on C.ID_produs = A.ID inner join pozeauto as p on p.ID_Auto = A.ID where ID_utilizator = '$idutilizator'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cos de cumparaturi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/ProductNavi.css" rel="stylesheet" type="text/css">
    <link href="../CSS/cos.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <script type="text/javascript" src="../JavaScript/search.js"></script>
     <link href="../CSS/search.css" rel="stylesheet" type="text/css">
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
  <a  class="linky" href="cos.php">Cos de cumparaturi</a>

  <div class="column-middle" >
    <h1>Cos de cumparaturi</h1>
    <table id="cosTable">
      <tr>
        <th style="width:57%" colspan="2">Produs</th>
        <th style="width:10%">Pret</th>
        <th style="width:8%">Cantitate</th>
        <th style="width:15%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
      </tr>

      <?php
      $total = 0;
      while($row = mysqli_fetch_assoc($result))
      {
        $sub = $row['Cantitate'] * $row['Pret'];
        echo '<tr>';
        echo '<th style="widh:18.5%">';
        echo '<a onclick="gotoProd(this.id)" id="'.$row['ID_Auto'].'">
        <img class="cos-prod" alt="img1" src="'.$row['Poza1'].'"></img>
        </a>
        </th>
        <th style="width:38.5%">
          <span>'.$row['Marca'].' '.$row['Model'].'</span>
        </th>
        <th style="width:10%">'.$row['Pret'].'</th>
        <th style="width:8%">'.$row['Cantitate'].'</th>
        <th style="width:15%" class="text-center">'.$sub.'
        <th style="width:10%"> <a style="cursor:pointer;" id="'.$row['ID_Auto'].'" onclick="deleteRow(this, this.id);"class="fa fa-trash" style="font-size:48px;color:black"></a></th>
      </tr>';
      $total = $total + $sub;
      }


      ?>


      <tr>
        <th style="width:18.5%">
        </th>
        <th style="width:38.5%">
          <span></span>
        </th>
        <th style="width:10%"></th>
        <th style="width:8%">Total:</th>
        <th style="width:15%" class="text-center"><?php echo $total ?></th>
        <th style="width:10%">euro</th>
      </tr>

    </table>

    <button onclick="window.location.href = 'listPage.php';" class="button button5">Continua Cumparaturile</button>
    <button style="float:right;" onclick="toPayment()" class="button button5">Plateste</button>
  </div>

      <hr/>
      <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>


      <script type="text/javascript">

        function toPayment(){
          var total = <?php echo $total ?>;
          if(total > 0)
          {
            $.ajax({
              type: 'POST',
              url: 'sumarComanda.php',
              data : {posttotal: total},
              success: function(response)
              {
                window.location.href = "sumarComanda.php";
              }
            });
          }
          else{ alert("Nu aveti nici un produs in cos");}
        }


        function deleteRow(elm, clicked_id){
           $.ajax({
          type: 'POST',
          url: 'cos.php',
          data : {postremove: clicked_id},
          success:function(response)
          {
             elm.parentNode.parentNode.parentNode.removeChild(elm.parentNode.parentNode);
             window.location.href = window.location.href;
          }
        });
        }

        function gotoProd(clicked_id)
        {

         $.ajax({
          type: 'POST',
          url: 'cos.php',
          data : {postid: clicked_id},
          success:function(response)
          {
            window.location.href="prodPage.php";
          }
        });
        }

        <?php

         if (!empty($_POST['postid']))
          {
              $_SESSION['clicked_id']=$_POST['postid'];
          }

          if (!empty($_POST['postremove']))
          {
              $idtoremove = mysqli_real_escape_string($conn, $_POST['postremove']);
              $sql = "DELETE from cartitems where ID_Produs = '$idtoremove'";
              $result = mysqli_query($conn,$sql);
          }

         ?>



      </script>

</html>
