<?php

session_start();
header('location:adminconnexion.php');
$database = "adminaccounts";
$db_handle = mysqli_connect('localhost','root','');
mysqli_select_db($db_handle,$database);

$adm  = $_POST['administrateur'];
$mdp  = $_POST['password'];

$s = "SELECT * FROM admin WHERE pseudo = '$adm' && password= '$mdp' ";

$result = mysqli_query($db_handle,$s);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['admin'] = $adm;
	header('location:home.php');
}else{
	header('location:adminconnexion.php');
}

?>