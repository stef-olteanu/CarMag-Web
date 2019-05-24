<?php
  session_start();
  $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "carmag";

  $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Autoturisme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../Images/logo.png">
    <link href="../CSS/Listpage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <script type="text/javascript" src="../JavaScript/search.js"></script>
     <link href="../CSS/search.css" rel="stylesheet" type="text/css">
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  </head>

  <div class="container"/>
  <div class="banner">
    <div class="container">
      <div class="topnav">
        <a href="../index.php">Home</a>
        <a  class="active" href="listPage.php">Autoturisme</a>
        <a href="../index.php#descriere">Despre</a>
        <a href="contact.php">Contact</a>

        <a href="cos.php" class='fas fa-shopping-cart' style="float:right"></a>
        <a href="userDetailsPage.php" class="far fa-user"   style="float:right"></a>
        <a onclick="openSearch()" href="#button" class="fa fa-search"  style="float:right; color:white"></a>


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
      <img class="centerImg" src="../Images/logo.png" />
    </a>

    <h1 style="color: white; text-align:center; font-size: 60px; margin-top:auto; margin-bottom:auto;">Autoturisme</h1>
    <div class="centerPath">
      <a class="linky" href="../index.php">Home<i class="right"></i></a>
      <a  class="linky" href="listPage.php">Autoturisme</a>
    </div>

    </div>

    <div class="rowy">
      <div class="leftcolumn">
        <div class="slidecontainer">
          <p>Pret minim: <span id="demo"></span> euro</p>
          <input type="range" min="1" max="1000000" value="50" class="slider" id="myRange">
        </div>

        <div class="slidecontainer">
          <p>Cai putere: <span id="hp"></span> HP</p>
          <input type="range" min="1" max="1000" value="50" class="slider" id="myRange2">
        </div>

        <div class="slidecontainer">
          <p>Stoc: <span id="stoc"></span> Buc.</p>
          <input type="range" min="0" max="10" value="0" class="slider" id="myRange3">
        </div>

        <p style="margin-left:20px">Combustibil:</p>

        <div style="margin-left: 40px;">
          <input type="radio" name="rb" id="rb1" />
          <label for="rb1">Benzina</label>
          <input type="radio" name="rb" id="rb2" />
          <label for="rb2">Diesel</label>
          <input checked="true" type="radio" name="rb" id="rb3" />
          <label for="rb3">Ambele</label>
        </div>

        <p style="margin-left:20px">Cutie de viteze:</p>

        <div style="margin-left: 40px;">
          <input type="radio" name="rb2" id="rb4" />
          <label for="rb4">Manuala</label>
          <input type="radio" name="rb2" id="rb5" />
          <label for="rb5">Automata</label>
          <input checked="true" type="radio" name="rb2" id="rb6" />
          <label for="rb6">Ambele</label>
        </div>

        <p style="margin-left:20px">Transmisie:</p>

        <div style="margin-left: 40px;">
          <input type="radio" name="cb7" id="rb7" />
          <label for="rb7">Fata</label>
          <input  type="radio" name="cb7" id="rb8" />
          <label for="rb8">Spate</label>
          <input  type="radio" name="cb7" id="rb9" />
          <label for="rb9">Integrala</label>
          <input checked="true"  type="radio" name="cb7" id="rb0" />
          <label for="rb0">Toate</label>
        </div>


        <p style="margin-left:20px">Caroserie:</p>

        <div style="margin-left: 40px;">
          <input type="radio" name="cb11" id="rb11" />
          <label for="rb11">Berlina</label>
          <input  type="radio" name="cb11" id="rb12" />
          <label for="rb12">Coupe</label>
          <input  type="radio" name="cb11" id="rb13" />
          <label for="rb13">SUV</label>
          <input  type="radio" name="cb11" id="rb14" />
          <label for="rb14">Cabrio</label>
          <input checked="true"  type="radio" name="cb11" id="rb15" />
          <label for="rb15">Toate</label>
        </div>


        <button style="margin-left: 20px;margin-top: 10px;" type="button" class="button button5" onclick="aplicaFiltre();">Aplica</button>

      </div>



      <div class="rightcolumn">
        <p>Sortare dupa pret: </p>
        <input type="radio" name="cb12" id="rb16" onclick="sortit(this.id)" />
        <label for="rb16">Crescator</label>
        <input  type="radio" name="cb12" id="rb17" onclick="sortit(this.id)" />
        <label for="rb17">Descrescator</label>
        <?php
        if(isset($_POST['postpret'])){

          $_SESSION['post'] = $_POST;
        }

        if(isset($_POST['postorder'])){
          $_SESSION['postorder'] = $_POST['postorder'];
         }


        if(isset($_SESSION['postorder'])){
          if($_SESSION['postorder'] == "crescator"){
            $order = "ASC";}
          else{
            $order = "DESC";
          }
        }else{
          $order = "ASC";
        }



        $results_per_page = 6;
         if(!isset($_GET['page'])) {
          $page=1;
        }else{
          $page = $_GET['page'];
        }

        $this_page_result = ($page-1)*$results_per_page;

        $sql = "SELECT * from autoturisme";
        $result = mysqli_query($conn,$sql);
        $number_of_results = mysqli_num_rows($result);


        $sql = "SELECT * FROM `autoturisme` as A
                inner join pozeauto as P
                on A.ID=P.ID_Auto
                ORDER BY A.Pret ".$order."
                LIMIT " . $this_page_result . ','.$results_per_page;

        if(isset($_SESSION['post']))
        {
          $pret = mysqli_real_escape_string($conn, $_SESSION['post']['postpret']);
          $hp = mysqli_real_escape_string($conn, $_SESSION['post']['posthp']);
          $stoc = mysqli_real_escape_string($conn, $_SESSION['post']['poststoc']);
          $comb = mysqli_real_escape_string($conn, $_SESSION['post']['postcomb']);
          $cutie = mysqli_real_escape_string($conn, $_SESSION['post']['postcutie']);
          $transmisie = mysqli_real_escape_string($conn, $_SESSION['post']['posttransmisie']);
          $caroserie = mysqli_real_escape_string($conn, $_SESSION['post']['postcaroserie']);


          $sql = "SELECT * FROM autoturisme as A
                  inner join pozeauto as P
                  on A.ID=P.ID_Auto
                  where Pret >= '$pret' and
                  Putere >= '$hp' and
                  Stoc >= '$stoc' and
                  Combustibil like '$comb' and
                  Cutie_Viteze like '$cutie' and
                  Transmisie like '$transmisie' and
                  Caroserie like '%$caroserie'";
        $result = mysqli_query($conn,$sql);
        $number_of_results = mysqli_num_rows($result);


                   $sql = "SELECT * FROM autoturisme as A
                  inner join pozeauto as P
                  on A.ID=P.ID_Auto
                  where Pret >= '$pret' and
                  Putere >= '$hp' and
                  Stoc >= '$stoc' and
                  Combustibil like '$comb' and
                  Cutie_Viteze like '$cutie' and
                  Transmisie like '$transmisie' and
                  Caroserie like '%$caroserie'
                  ORDER BY A.Pret ".$order."
                   LIMIT " . $this_page_result . ','.$results_per_page;
        }
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck == 0)
        {
          echo "Nu exista autoturisme conform filtrelor dvs.";
        }
        else{
          $contor = 1;
          while($row = mysqli_fetch_assoc($result)){
            if($contor % 3 == 1)
            {
              echo '<div class="row">';
            }

            echo '<div class="column">
                <a onclick="gotoProd(this.id)" id="'.$row['ID_Auto'].'">
                <img style="cursor:pointer;" class="img-prod" src="'.$row['Poza1'].'"
                onmouseover="this.src=\''.$row['Poza3'].'\';"
                onmouseout="this.src=\''.$row['Poza1'].'\';"/>
                </a>
                <p class="numeProd">'.$row['Marca'].' '.$row['Model'].'</p>
                <p class="numeProd">'.$row['Pret'].' euro</p>
                </div>';
                $contor = $contor+1;

            if($contor % 4 == 0 )
            {
              echo '</div>';
            }
          }
         }


        ?>
      </div>

      <?php
       $number_of_pages = ceil($number_of_results/$results_per_page);
        echo "<div class='pagination p2'>
              <ul>";
        for ($page=1;$page <=$number_of_pages; $page++){

          echo '<a href="listPage.php?page=' . $page . '">'.$page.'</a>';
        }
        echo "</ul>
        </div>";

      ?>

  <br/>
  <hr/>
  <p align="center">Website made by <a href="https://www.facebook.com/Steffanutz">Stefan Olteanu</a></p>



    <script type="text/javascript">
      var slider = document.getElementById("myRange");
      var slider2 = document.getElementById("myRange2");
      var slider3 = document.getElementById("myRange3");

      var output = document.getElementById("demo");
      var output2 = document.getElementById("hp");
      var output3 = document.getElementById("stoc");

      output.innerHTML = slider.value;
      output2.innerHTML = slider2.value;
      output3.innerHTML = slider3.value;

      slider.oninput = function() {
        output.innerHTML = this.value;
      }

      slider2.oninput = function() {
        output2.innerHTML = this.value;
      }

      slider3.oninput = function() {
        output3.innerHTML = this.value;
      }

    </script>

    <script type="text/javascript">
      var pret = '<?php if(isset($_SESSION['post']))
                    {echo $_SESSION['post']['postpret'];}else {echo "none";}?>';
      if(pret != "none")
      {
        document.getElementById("demo").innerHTML = pret;
      }

      var hp = '<?php if(isset($_SESSION['post']))
                    {echo $_SESSION['post']['posthp'];}else {echo "none";}?>';
      if(hp != "none"){
        document.getElementById("hp").innerHTML = hp;
      }


      var stoc = '<?php if(isset($_SESSION['post']))
                    {echo $_SESSION['post']['poststoc'];}else {echo "none";}?>';
      if(hp != "none"){
        document.getElementById("stoc").innerHTML = stoc;
      }

      var combustibil = '<?php if(isset($_SESSION['post'])){
        print $_SESSION['post']['postcomb'];
      }else
      {
        echo "none";
      }?>';

      if(combustibil != "none"){
        if(combustibil == "Benzina"){
          document.getElementById("rb1").checked=true;
        }
        if(combustibil == "Diesel"){
          document.getElementById("rb2").checked = true;
        }
        if(combustibil == "%"){
          document.getElementById("rb3").checked = true;
        }
      }


      var cutie = '<?php if(isset($_SESSION['post'])){
        print $_SESSION['post']['postcutie'];
      }else
      {
        echo "none";
      }?>';

      if( cutie != "none"){
        if(cutie == "Manuala"){
          document.getElementById("rb4").checked = true;
        }
        if(cutie == "Automata"){
          document.getElementById("rb5").checked = true;
        }
        if(cutie == "%"){
          document.getElementById("rb6").checked = true;
        }
      }


      var transmisie = '<?php if(isset($_SESSION['post'])){
        print $_SESSION['post']['posttransmisie'];
      }else{
        echo ("none");
      }?>';

      if(transmisie != "none"){
        if(transmisie == "Fata"){
          document.getElementById("rb7").checked = true;
        }
        if(transmisie == "Spate"){
          document.getElementById("rb8").checked = true;
        }
        if(transmisie == "Integrala"){
          document.getElementById("rb9").checked = true;
        }
        if(transmisie == "%"){
          document.getElementById("rb0").checked = true;
        }
      }


      var caroserie = '<?php if(isset($_SESSION['post'])){
        print $_SESSION['post']['postcaroserie'];
      }else{
        echo "none";
      }?>';

      if(caroserie != "none")
      {
        if(caroserie == "Berlina"){
          document.getElementById("rb11").checked = true;
        }
        if(caroserie == "Coupe"){
          document.getElementById("rb12").checked  = true;
        }
        if(caroserie == "SUV"){
          document.getElementById("rb13").checked = true;
        }
        if(caroserie == "Cabrio"){
          document.getElementById("rb14").checked = true;
        }
        if(caroserie == "%"){
          document.getElementById("rb15").checked = true;
        }
      }

      var ording = '<?php if(isset($_SESSION['postorder'])){
        print $_SESSION['postorder'];
      }else{
        echo "none";
      }?>';


      if(ording == "crescator")
      {
        document.getElementById("rb16").checked = true;
      }
      else{
        document.getElementById("rb17").checked = true;
      }

      function sortit(clicked_id){
        var order = "crescator";
        if(clicked_id == "rb16")
        {
          order = "crescator";
        }
        if(clicked_id == "rb17"){
          order = "descrescator";
        }

        $.ajax({
          type: 'POST',
          url: 'listPage.php',
          data : {postorder: order},
          success:function(response)
          {
            window.location.href = window.location.href;
          }
        });
      }


      function aplicaFiltre(){
          var slider = document.getElementById("myRange");
          var slider2 = document.getElementById("myRange2");
          var slider3 = document.getElementById("myRange3");

          var pret_minim = slider.value;
          var hp_minim = slider2.value;
          var stoc_minim = slider3.value;
          var Combustibil = "Ambele";
          var Cutie = "Ambele";
          var Transmisie = "Toate";
          var Caroserie = "Toate";

          if( document.getElementById("rb1").checked == true)
          {
            Combustibil = "Benzina";
          }

          if( document.getElementById("rb2").checked == true)
          {
            Combustibil = "Diesel";
          }

          if( document.getElementById("rb3").checked == true)
          {
            Combustibil = "%";
          }

          if( document.getElementById("rb4").checked == true)
          {
            Cutie = "Manuala";
          }

          if( document.getElementById("rb5").checked == true)
          {
            Cutie = "Automata";
          }

          if( document.getElementById("rb6").checked == true)
          {
            Cutie = "%";
          }

          if( document.getElementById("rb7").checked == true)
          {
            Transmisie = "Fata";
          }

          if( document.getElementById("rb8").checked == true)
          {
            Transmisie = "Spate";
          }

          if( document.getElementById("rb9").checked == true)
          {
            Transmisie = "Integrala";
          }

          if( document.getElementById("rb0").checked == true)
          {
            Transmisie = "%";
          }


          if( document.getElementById("rb11").checked == true)
          {
            Caroserie = "Berlina";
          }

          if( document.getElementById("rb12").checked == true)
          {
            Caroserie = "Coupe";
          }

          if( document.getElementById("rb13").checked == true)
          {
            Caroserie = "SUV";
          }

          if( document.getElementById("rb14").checked == true)
          {
            Caroserie = "Cabrio";
          }

          if( document.getElementById("rb15").checked == true)
          {
            Caroserie = "%";
          }


          $.ajax({
          type: 'POST',
          url: 'listPage.php',
          data : {postpret: pret_minim, posthp: hp_minim, poststoc: stoc_minim, postcomb: Combustibil, postcutie: Cutie, posttransmisie: Transmisie, postcaroserie: Caroserie},
          success:function(response)
          {
            window.location.href = window.location.href;
          }
        });

      }


      function gotoProd(clicked_id)
      {
         $.ajax({
          type: 'POST',
          url: 'listPage.php',
          data : {postid: clicked_id},
          success:function(response)
          {
            window.location.href="prodPage.php";
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
