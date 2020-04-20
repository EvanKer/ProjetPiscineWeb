<!DOCTYPE html>
<html lang="en">

<?php 
session_start(); 
if (!isset($_SESSION['vendeur'])){

header('location:utilvendeur.php');

}else{ 
$utilisateur = $_SESSION['vendeur']; 
}
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MES ITEMS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

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
            <a class="nav-link" href='http://localhost/ecebay/contact.php'>Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/connexion.php'>Mon Compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/panier.php'>Mon Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/mesitems.php'>Mes Items</a>
          </li>
          <input type="search" name="research" id="site-search">
          <button>Search</button>
        </ul>
      </div>
    </div>
  </nav>
  <div id="container">  <br><br><br><br><br><br>
  <p>ITEM DE : <?php echo $utilisateur?></p>
  <br><br><br>

<?php

$mysqli= new mysqli('localhost', 'root', '', 'items');
$mysqli->set_charset("utf8");
$requete='SELECT * FROM sneakers';
$resultat = $mysqli->query($requete);


while ($ligne=$resultat->fetch_assoc()) {

  if ($ligne['vendeur']==$utilisateur)
  {

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';
  //echo $ligne['photo'].''.'<br>';
  echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br><br><br><br>';
  $ligne['nom']=str_replace(' ','',$ligne['nom']);
  $nom=$ligne['nom'].'.php';
  //echo '<a href="'.$nom.'"><button>BUY NOW</button></a>'.'<br><br><br>';
  if ($ligne['etat']=='0')
  {
    echo "l item est en cours de vente".'<br>';
    echo "fin de la vente : ".$ligne['tempsRestant'].'<br><br><br>';
  }
  if ($ligne['etat']=='1')
  {
    echo "la vente est conclue".'<br><br><br>';
  }

}

}

//echo '<a href="paiement.php"><button>PAIEMENT</button></a>'.'<br><br><br>'

  

  ?>

  <br><br><br><br></div>


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

