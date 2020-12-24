<?php
$conn = mysqli_connect("localhost", "rahmat_ryu", "", "db_perawatid"); 

function url($url) {
	$crypt = crypt('page', $url);
	$set_url = "web.php?page=".$url."&view=".$crypt;
	return $set_url;
}

date_default_timezone_set("Asia/Makassar");

?>
