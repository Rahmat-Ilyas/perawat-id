<?php 
session_start();
$conn = mysqli_connect("localhost", "rahmat_ryu", "", "db_perawatid"); 

function url($url) {
	$crypt = crypt('page', $url);
	$set_url = "web.php?page=".$url."&view=".$crypt;
	return $set_url;
}

if (isset($_GET['logout'])) {
	session_unset();
	session_destroy();
	$pass = $_COOKIE['login'];
	setcookie($pass, '', time()-172800);
	setcookie('login', '', time()-172800);
	setcookie('this', '', time()-172800);

	header("location: login.php");
}

date_default_timezone_set("Asia/Makassar");

?>
