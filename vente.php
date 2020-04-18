<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VENTE</title>

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
    <div class="row">


      <div class="col-lg-9">

        <div class="card mt-4"><<br><br><br><br>
          <h1><center>formulaire de vente</center></h1>
          <div class="card-body">

          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           Veuillez renseigner les informations suivantes
         </div>
         <div class="card-body">
          <form method="post">
            NOM<br>
            <input type="text" name="nom_item" value=""><br><br>
            DESCRIPTION<br>
            <input type="text" name="description_item" value=""><br><br>
            CATEGORIE<br>
            <select name="cat_item">
              <option value="sneakers">sneakers</option>
              <option value="streetwear">street</option>
              <option value="collectibles">collec</option>
              <br><br>
            </select><br><br>
            TYPE DE VENTE<br>
            <select name="vente_item">
              <option value="encheres">Encheres</option>
              <option value="offre">Meilleur Offre</option>
            </select><br><br>
            PRIX EN VENTE DIRECT<br>
            <input type="text" name="prix_item" value=""><br><br>
            PHOTO DE L'ITEM<br>
            <input type="file" name="photo_item" value=""><br><br>
            DATE DE FIN DE VENTE<br>
            <input type="datetime-local" name="date_item" value=""><br><br>

            <input type="submit" name="button" value="enregistrer">

          </form>


        </div>
        
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
  </div>
</div>

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
$nom = isset($_POST["nom_item"])? $_POST["nom_item"] : "";
$description = isset($_POST["description_item"])? $_POST["description_item"] : "";
$categorie = isset($_POST["cat_item"])? $_POST["cat_item"] : "";
$vente = isset($_POST["vente_item"])? $_POST["vente_item"] : "";
$prix = isset($_POST["prix_item"])? $_POST["prix_item"] : "";
$photo =isset($_POST["photo_item"])? $_POST["photo_item"] : "";


$database ="items";

$mysqli = new mysqli('localhost', 'root', '', 'items');

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button"]) {
  if ($db_found) {
  $sql = "SELECT * FROM $categorie";
  $result = mysqli_query($db_handle, $sql);
  $photo = addslashes($photo);

  $sql ="INSERT INTO $categorie (nom,description,categorie,vente,prix,photo)
  VALUES ('$nom','$description','$categorie','$vente','$prix','$photo')";
  $result =mysqli_query($db_handle, $sql);  
}


 else { echo "databse not found";

 }

 }

mysqli_close($db_handle);

?>