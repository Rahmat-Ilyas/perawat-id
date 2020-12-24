<?php
require('config.php');
if (isset($_POST['kirim'])) {
	$nama = str_replace("'", "''", htmlspecialchars($_POST['nama']));
	$email = str_replace("'", "''", htmlspecialchars($_POST['email']));
	$pesan = str_replace("'", "''", htmlspecialchars($_POST['pesan']));
	$date = date('Y-m-d H-i-s');

	$query = "INSERT INTO tb_message VALUES('', '$nama', '$email', '$pesan', 'unread', '$date')";
	if (mysqli_query($conn, $query)) { 
		setcookie('send', true, time()+8);
                if (isset($_POST['judul'])) {
                        $title = $_POST['judul'];
                        echo "<script>document.location.href='news.php?title=".$title."';</script>";
                }
                else echo "<script>document.location.href='index.php#contact-section';</script>";
	}
}
?>