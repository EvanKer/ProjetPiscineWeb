?php minicode="php"><?php session_start(); ?></minicode>


<html>
<head>
  <title> User infos  </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>

  <link rel="stylesheet" type="text/css" href="styleconnexionuser.css">
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

<!-- Page Content -->
<div class="container">
	<div class="login-box">	
	<div class="row">
		<div class="col-md-6 login-left">
			<h2> Veuillez remplir vos informations supplémentaires :  </h2>
			<h5> Obligatoire pour effectuer une transaction </h5>
			<form action="uservalidation.php" method="post">
				<div class="form-group">
					<label>Nom :</label>
					<input type="text" name="Nom" class="form-control" required>
					</div>
				<div class="form-group">
					<label>Prénom :</label>
					<input type="text" name="Prenom" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Adresse 1 :</label>
					<input type="text" name="Adresse01" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Adresse 2 :*</label>
					<input type="text" name="Adresse02" class="form-control">
					</div>
					<div class="form-group">
					<label>Ville :</label>
					<input type="text" name="Ville" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Code Postal :</label>
					<input type="number" name="Codepostal" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Pays :</label>
					<input type="text" name="Pays" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Tel :</label>
					<input type="number" name="Tel" class="form-control" required>
					</div>
					<h2> Informations de paiement :  </h2><br>
					<div class="form-group">
					<label>Carte Bancaire :</label>					
                    <SELECT name="CB" size="1">
                    <option value="Visa">Visa</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Americanexpress">AmericanExpress</option>                 
                    </SELECT>                  
					</div>
					<div class="form-group">
					<label>Numéro CB :</label>
					<input type="text" name="NumCB" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Nom CB :</label>
					<input type="text" name="NomCB" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Date d'expiration :</label>									
                    <input type="date" id="DateExpiration" name="DateExpiration" min="2020-04-20" required>                    
					</div>
					<div class="form-group">
					<label>CVV :</label>
					<input type="number" name="CVV" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Vous acceptez de vous engager à l'achat d'un item dès lors que vous faites une offre pour celui-ci</label>
					<input type="radio" name="Clause" id="Clause" value="Accepte" required>
					</div>
					<h6> *Ces champs sont optionnels </h6><br><br>
					<button type="submit" name="bouton01" class="mon-bouton"> Soumettre </button>	 
            </form>
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