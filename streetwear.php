<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>streetwear</title>

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
  <div id="container">  <br><br><br>
    <div class="titre">
  Streetwear</div>
  <br>
  <form action="testachat3.php" method="post"><ul>

<?php


$mysqli= new mysqli('localhost', 'root', '', 'items');
$mysqli->set_charset("utf8");
$requete='SELECT * FROM streetwear';
$resultat = $mysqli->query($requete);

while ($ligne=$resultat->fetch_assoc()) {
echo '<div id="gameGrid"><br>';
  echo $ligne['nom'].''.'<br><br>';
  echo $ligne['description'].''.'<br><br>';
  //echo $ligne['categorie'].''.'<br><br>';
  echo "type de vente : " .$ligne['vente'].''.'<br><br>';
  echo "achat immediat : ".$ligne['prix'].''.'<br><br>';
  //echo $ligne['photo'].''.'<br>';
  echo '<img width="250px" height="167px" src="'.$ligne['photo'].'" alt=""/>'.'<br>';

  //echo '<td><input type="submit" value="Modifier" name='.$data_menu['nom'].'></td>';
  //echo '<input type="hidden" name="nomlien" value="'.$ligne['nom'].'" />';
  //echo '<a href="testachat.php"><button>BUY NOW '.$_SESSION['item'].'</button></a>'.'<br><br><br>';
  //echo '<a href="testachat.php"  name="boutontest" value="'.$ligne['nom'].'" style="color:#FF0000;"> BUY NOW </a>'.'<br><br><br>';
  echo '<button name="nomlien" value="'.$ligne['nom'].'" type="submit" class="styled"> BUY NOW </button>'.'<br><br><br>';

  echo '</div>';

}

  ?>


</ul>
</form>  

  <br><br><br><br></div>

<!-- Footer -->

  <!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

