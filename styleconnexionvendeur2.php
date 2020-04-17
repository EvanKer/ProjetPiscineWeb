<?php header("Content-type: text/css");
session_start();
$idf = $_SESSION['image'];

?>


body{
	background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(<?php echo $idf;?>);
	background-size: cover;
	background-position: center;
}

.login-center{
	background: rgba(211,211,211,0.4);
	border-width: 1px;
    border-style: solid;
    border-color: black;
    border-radius: 50px;
	padding: 30px;
	
}
.login-left{
	background: rgba(211,211,211,0.4);
	border-width: 1px;
    border-style: solid;
    border-color: black;
    border-radius: 50px;
	padding: 30px;
}


.login-box{
	max-width: 1200px;
	float: none;
	margin: 30 auto;
	margin-left: 300px;
    width: 1000px;
}

.form-control{
	background-color: #fff !important;
}

.mon-bouton {
	background-image: linear-gradient(to right, #EFEFBB 0%, #D4D3DD 51%, #EFEFBB 100%)
}
.mon-boutton:hover { 
	background-position: right center; 
}


.userinfos {
    max-width: 700px;
	float: none;
	margin: auto;
	margin-bottom: 50px;
    width: auto;

}

.vendeurmoncompte {
	max-width: 700px;
	float: none;
	margin: auto;
	margin-bottom: 200px;
    width: auto;
}


.info-client {
    background: rgba(100,100,100,0.3);
	border-width: 1px;
    border-style: solid;
    border-color: black;
    border-radius: 10px;
	padding: 100px;

}

a.float-right{
  
  margin-top: 10px;
  margin-right: 160px;
  font-size: 20px;
  text-transform: uppercase;
  background: rgba(200,150,150,0.4);
  border-width: 3px;
  border-bottom-right-radius: : 5px;
  border-style: solid;
  border-color: rgba(200,50,50,0.8);

}

a.float-mid{
  margin-bottom:50px;
  margin-left: 262px;
  font-size: 20px;
  text-transform: uppercase;
  background: rgba(200,150,150,0.4);
  border-width: 3px;
  border-bottom-right-radius: : 5px;
  border-style: solid;
  border-color: rgba(200,50,50,0.8);

}




h1{
	color: #fff !important;
	margin-top: 100px !important;
	text-align: center;
	text-transform: uppercase;
}

p{
    color: #fff !important;
	margin-top: 0px !important;
	font-family: 'Bookman Old Style', serif;
	text-align: center;
}

h2{

	color: white!important;
}

h6{

	color: red!important;
}
