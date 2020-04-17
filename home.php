<?php

session_start();
if(!isset($_SESSION['admin'])){
	header('location:adminconnexion.php');
}
?>



<html>
<head>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Home Page </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>

  <link rel="stylesheet" type="text/css" href="styleconnexionadmin.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

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
          <input type="search" name="research" id="site-search">
          <button>Search</button>
        </ul>
      </div>
    </div>
  </nav>

      <div class="container">
      <h1>Bienvenue <?php echo $_SESSION['admin']; ?></h1> 
     <div class="container">
      <div class="login-box2"> 
      <div class="row">
            <div class="col-md-6 login-left">
                  <h2> Fournisseurs </h2>
                  <form action="adminfonctions.php" method="post">
                        <div class="form-group">
                              <label>E-mail </label>
                              <input type="text" name="Email" class="form-control" required>
                              </div>
                        <div class="form-group">
                              <label>Pseudo</label>
                              <input type="text" name="Pseudo" class="form-control" required>
                              </div>
                              <button type="submit" name="bouton01" class="mon-bouton"> Ajouter </button>  
                              <button type="submit" name="bouton02"class="mon-bouton"> Supprimer </button> 
            </form>
        </div>    
    
        <div class="col-md-6 login-right">
                  <h2> Items </h2>
                  <form action="adminfonctions.php" method="post">
                        <div class="form-group">
                              <label>Titre</label>
                              <input type="text" name="titre" class="form-control" required>
                              </div>
                        <div class="form-group">
                              <label>Mot de passe</label>
                              <input type="text" name="password" class="form-control" required>
                              </div>
                              <button type="submit" name="bouton03" class="mon-bouton"> Ajouter </button>
                              <button type="submit" name="bouton04" class="mon-bouton">Supprimer </button>       
            </form>
        </div>         
    </div>
    <a class="float-right" href="admindeconnexion.php"> Se deconnecter </a>
    </div>
</div>

     
</div>
</div>

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