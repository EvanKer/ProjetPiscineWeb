<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if(isset($_SESSION['client'])){
  $utilisateur = $_SESSION['client'];
}elseif(isset($_SESSION['vendeur'])){
  header('location:vendeurmoncompte.php');
}elseif(isset($_SESSION['admin'])){
  header('location:adminmoncompte.php');
}elseif(!isset($_SESSION['client'])){
  header('location:connexion.php');
}
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MON PANIER</title>

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
          <input type="search" name="research" id="site-search">
          <button>Search</button>
        </ul>
      </div>
    </div>
  </nav>
  <div id="container">  <br><br><br><br><br><br>
  <p>PANIER DE : <?php echo $utilisateur?></p>
  <br><br><br>

<?php

$mysqli= new mysqli('localhost', 'root', '', 'items');
$mysqli->set_charset("utf8");

$nbr_articles = 0;

$requete='SELECT * FROM sneakers';
$resultat = $mysqli->query($requete);

while ($ligne=$resultat->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']!= 3 ) // et etat != 3
  {

	echo $ligne['nom'].''.'<br>';
	echo $ligne['description'].''.'<br>';
	echo $ligne['categorie'].''.'<br>';
	echo $ligne['vente'].''.'<br>';
	echo $ligne['prix'].''.'<br>';

	echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';
	$ligne['nom']=str_replace(' ','',$ligne['nom']);
	$nom=$ligne['nom'].'.php';
	if ($ligne['etat']=='0')
  {
    echo "l enchere continue".'<br>';
    echo "fin de la vente : ".$ligne['tempsRestant'].'<br><br><br>';
  }
  if ($ligne['etat']=='1')
  {
    echo "la vente est conclue".'<br><br><br>';
    $nbr_articles = $nbr_articles +1;
  }


}

}

$requete1='SELECT * FROM streetwear';
$resultat1 = $mysqli->query($requete1);


while ($ligne=$resultat1->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']!= 3 ) // et etat != 3
  {

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';

  echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';
  $ligne['nom']=str_replace(' ','',$ligne['nom']);
  $nom=$ligne['nom'].'.php';
  if ($ligne['etat']=='0')
  {
    echo "l enchere continue".'<br>';
    echo "fin de la vente : ".$ligne['tempsRestant'].'<br><br><br>';
  }
  if ($ligne['etat']=='1')
  {
    echo "la vente est conclue".'<br><br><br>';
    $nbr_articles = $nbr_articles +1;
  }


}

}

$requete2='SELECT * FROM collectibles';
$resultat2 = $mysqli->query($requete2);


while ($ligne=$resultat2->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']!= 3 ) // et etat != 3
  {

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';

  echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';
  $ligne['nom']=str_replace(' ','',$ligne['nom']);
  $nom=$ligne['nom'].'.php';
  if ($ligne['etat']=='0')
  {
    echo "l enchere continue".'<br>';
    echo "fin de la vente : ".$ligne['tempsRestant'].'<br><br><br>';
  }
  if ($ligne['etat']=='1')
  {
    echo "la vente est conclue".'<br><br><br>';
    $nbr_articles = $nbr_articles +1;
  }


}

}

if ($nbr_articles != 0){
echo '<a href="informationsdepaiement.php"><button>Procéder au paiement</button></a>'.'<br><br><br>';
}

  

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

