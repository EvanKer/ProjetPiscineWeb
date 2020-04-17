<?php

session_start();
header('location:vendeurconnexion.php');
$database = "selleraccounts";
$db_handle = mysqli_connect('localhost','root','');
mysqli_select_db($db_handle,$database);

$mail  = $_POST['Email'];
$pseu  = $_POST['Pseudo'];

$s = "SELECT * FROM seller WHERE email = '$mail' && pseudo= '$pseu' ";

$result = mysqli_query($db_handle,$s);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['vendeur'] = $pseu;
	header('location:vendeurconnected.php');
}else{
	header('location:vendeurconnexion.php');
}

?>