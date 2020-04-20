<?php

session_start();
if(isset($_SESSION['vendeur'])){
  header('location:vendeurmoncompte.php');
}

$item = $_POST['nomlien'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>achat</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href='http://localhost/ecebay/index.php'>Le shop du BG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>            
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/adminconnexion.php'>Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/vendeurconnexion.php'>Espace Vendeur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/achat.php'>Achat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= 'http://localhost/ecebay/vente.php'>Ventes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= 'http://localhost/ecebay/negociations.php'>Negociations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/contact.php'>Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/connexion.php'>Mon Compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/panier.php'>Mon Panier</a>
          </li>
          <input type="search" name="research" id="site-search">
          <button>Search</button>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">


    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div class="card mt-4">
        <img class="card-img-top img-fluid" src="chicago.jpg" alt="">
        <div class="gameGrid">
          <h3 class="card-title"><?php echo $item ?></h3>

          <h4>Enchere actuelle :
           <?php

           $mysqli= new mysqli('localhost', 'root', '', 'items');
           $mysqli->set_charset("utf8");
           $requete='SELECT `prixActuel` FROM `sneakers` WHERE nom= "'.$item.'" ';
           $resultat = $mysqli->query($requete);

           while ($ligne=$resultat->fetch_assoc()) {

            echo $ligne['prixActuel'].'  $'.'<br>'; 
            

          }

          ?>

        </h4><br>
        <h4>DATE DE FIN DE  :
          <?php

         // $mysqli= new mysqli('localhost', 'root', '', 'items');
         // $mysqli->set_charset("utf8");
          $database ="items";

          $mysqli = new mysqli('localhost', 'root', '', 'items');

          $db_handle = mysqli_connect('localhost', 'root', '');
          $db_found = mysqli_select_db($db_handle, $database);
          $requete='SELECT `tempsRestant` FROM `sneakers` WHERE nom= "jordan1 chicago" ';
          $resultat = mysqli_query($db_handle, $requete);
          $dateActuel =date("yy-m-d");

          while ($ligne=$resultat->fetch_assoc()) {

           echo $ligne['tempsRestant'].''.'<br>';
           echo "DATE DU JOUR : ".$dateActuel.'<br>';  

           if ($dateActuel<=$ligne['tempsRestant'])
           {
            echo "il reste du temps chakal<br>";

            $sql = "SELECT etat FROM sneakers ";
            $result = mysqli_query($db_handle, $sql);

            $sql ="UPDATE sneakers SET etat = '0' WHERE `sneakers`.`id` = 3";
            $result =mysqli_query($db_handle, $sql); 


          }

          else if ($dateActuel>$ligne['tempsRestant'])

          {
            echo "la vente est finie chakal<br>";
            $sql = "SELECT etat FROM sneakers ";
            $result = mysqli_query($db_handle, $sql);

            $sql ="UPDATE sneakers SET etat = '1' WHERE `sneakers`.`id` = 3";
            $result =mysqli_query($db_handle, $sql);
          }

         // $compteur = abs($ligne['tempsRestant'] - $dateActuel);

          //echo $compteur;


        } 

          //echo "DATE DU JOUR : ".$dateActuel.'<br>';  

        ?>
      </h4>


      <p class="card-text"><br>
      <?php echo $Description ?></p>
      <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
      4.0 stars
    </div>
  </div>


  <!-- /.card -->

  <div class="card card-outline-secondary my-4">
    <div class="card-header">
      What do you want to do
    </div>
    <div class="card-body">
      <form method="post">
        <p>
          <input type="text" name="prix_actuel_item">    
          <?php 


          $mysqli= new mysqli('localhost', 'root', '', 'items');
          $mysqli->set_charset("utf8");
          $requete='SELECT * FROM sneakers WHERE nom= "jordan1 chicago" ';
          $resultat = $mysqli->query($requete);

          while ($ligne=$resultat->fetch_assoc()) {

            if ($ligne['prix']===$ligne['prixActuel'])
            {

              $disabled = ' disabled="disabled"';

            }

            if ($ligne['prix']<>$ligne['prixActuel'])
            {

              $disabled = '';


            }
            
          }

          echo '<input type="submit" name="button1" value="faire une offre" '.$disabled.' >';

          ?>
        </p>
        <hr>
        <p>
          <?php echo '<input type="submit" name="button2" value="acheter maintenant" '.$disabled.'>';  ?>
        </p>
      </form>

    </div>
  </div>
  <!-- /.card -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- Début du compteur -->


</div>
<!-- /.container -->


<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


<?php
$prixActuel = isset($_POST["prix_actuel_item"])? $_POST["prix_actuel_item"] : "";
$utilisateur = $_SESSION['client'];

$database ="items";

$mysqli = new mysqli('localhost', 'root', '', 'items');

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$requete= "SELECT prixActuel AND prix FROM sneakers ";
$resultat = mysqli_query($db_handle, $requete);
$requete2= "SELECT etat FROM sneakers ";
$resultat2 = mysqli_query($db_handle, $requete2);

while ($ligne=$resultat2->fetch_assoc()) {

  if ($ligne['etat']=='0'){

    if($_POST["button1"]) { // faire une offre
      if ($db_found) {

        $sql = "SELECT prixActuel FROM sneakers ";
        $result = mysqli_query($db_handle, $sql);

        $sql ="UPDATE sneakers SET prixActuel = '$prixActuel' WHERE `sneakers`.`id` = 3";
        $result =mysqli_query($db_handle, $sql);  

      }

    }

    if($_POST["button2"]) // achat immédiat
      if ($db_found) {

        $sql = "SELECT prixActuel AND prix FROM sneakers ";
        $result = mysqli_query($db_handle, $sql);

        $sql ="UPDATE sneakers SET prixActuel = prix WHERE `sneakers`.`id` = 3";
        $result =mysqli_query($db_handle, $sql);  
      }


    }



    else { echo "databse not found";

  }

}



  mysqli_close($db_handle);

  ?>

  <script>
// raccourci d’écriture
function $(id){return document.getElementById(id)}

function hms(){
  var today=new Date();
  var year=today.getFullYear(),mth=today.getMonth(),day=today.getDate();
  var hrs=today.getHours(),mns=today.getMinutes(),scd=today.getSeconds();


  var str=(year)+"-"+(mth<10?"0"+mth:mth)+"-"+(day<10?"0"+day:day)+" "+(hrs<10?"0"+hrs:hrs)+":"+(mns<10?"0"+mns:mns)+":"+(scd<10?"0"+scd:scd);
  $("clock").innerHTML=str;
    setTimeout(hms,1000);// réécriture toutes les 1000 millisecondes
  }
hms();// lancement de la fonction
</script>

