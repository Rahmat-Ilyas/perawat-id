<?php 
require("config.php");
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'vendor/autoload.php';
//$mail = new PHPMailer(true);

//tambah dan edit news
if (isset($_POST['posting'])) {
	$title_news = htmlspecialchars($_POST['title_news']);
	$string = $_POST['fill_news'];
	$cut = explode('"', $string);
	foreach ($cut as $ct) {
		if (strlen($ct) > 1000) {
			$images[] = $ct;
			$ket = true;
		}
	}

	if ($_POST['status'] == null) { // add news
		if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != null) {
			$name = $_FILES['cover']['name'];
			$tmpname = $_FILES['cover']['tmp_name'];
			$name_file = "IMG-PRID-".date('mdy').date('His').".png";

			$news = mysqli_query($conn, "SELECT * FROM tb_news ORDER BY id DESC");
			$dta = mysqli_fetch_assoc($news);
			$id_news = $dta['id']+1;
			$dir = "assets/images/news/content/";

			if (isset($ket)) {
				$gt_fill_news = $string;
				foreach ($images as $i => $str) {
					$fill_news = str_replace($str, $dir."image_news_".$id_news."_".$i.".jpg", $gt_fill_news);
					$gt_fill_news = $fill_news;
				}
			}
			else $fill_news = $_POST['fill_news'];
			date_default_timezone_set("Asia/Makassar");
			$date = date('Y-m-d H-i-s');
			$str_fix = str_replace("'", "''", $fill_news);
			$query = "INSERT INTO tb_news VALUES(null, '$title_news', '$name_file', '$str_fix', '$date', '')";
			if(mysqli_query($conn, $query)) {
				$id_last = mysqli_insert_id($conn);
				if (isset($ket)) {
					foreach ($images as $i => $img) {
						$cut1 = explode(',', $img);
						$save_image = base64_decode($cut1[1]);
						$file = "image_news_".$id_news."_".$i.".jpg";
						file_put_contents($dir.$file, $save_image);
						mysqli_query($conn, "INSERT INTO tb_news_content VALUES(null, '$id_last', '$file')");
					}
				}
				move_uploaded_file($tmpname,'assets/images/news/cover/'.$name_file);
				echo "<script>alert('Berita baru bergasil di posting ^_^');
				document.location.href='".url('news')."'</script>";
			}
			else {
				echo mysqli_error($conn);
			}
		}
	}
	else { // edite news
		$id = $_POST['status'];
		$news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id='$id'");
		$dta = mysqli_fetch_assoc($news);


		// update gambar
		if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != null) {
			$name = $_FILES['cover']['name'];
			$tmpname = $_FILES['cover']['tmp_name'];
			$name_file = "IMG-PRID-".date('mdy').date('His').".png";
			$update = true;
		}
		else {
			$name_file = $dta['cover'];
			$update = false;
		}

		// update fill
		$id_last = mysqli_query($conn, "SELECT * FROM tb_news_content WHERE id_news='$id' ORDER BY id DESC");
		$set_i = mysqli_fetch_assoc($id_last);
		$get_id = 1;
		$get_id = $set_i['id']+1;
		$dir = "assets/images/news/content/";
		if (isset($ket)) {
			$gt_fill_news = $string;
			$i = $get_id;
			foreach ($images as $str) {
				$fill_news = str_replace($str, $dir."image_news_".$id."_".$i.".jpg", $gt_fill_news);
				$gt_fill_news = $fill_news;
				$i = $i + 1;
			}
		}
		else $fill_news = $_POST['fill_news'];

		$str_fix = str_replace("'", "''", $fill_news);
		$query = "UPDATE tb_news SET title_news= '$title_news', cover= '$name_file', fill_news= '$str_fix' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			if ($update) {
				move_uploaded_file($tmpname,'assets/images/news/cover/'.$name_file);
				$picture = "assets/images/news/cover/".$dta['cover'];
				if (file_exists($picture)) unlink($picture);
			}

			$get_image = mysqli_query($conn, "SELECT * FROM tb_news_content WHERE id_news='$id'");
			foreach ($get_image as $image) {
				$find = strpos($str_fix, $image['image']);
				if(!$find) {
					$img = $image['image'];
					$remove = "assets/images/news/content/".$img;
					if (file_exists($remove)) unlink($remove);
					mysqli_query($conn, "DELETE FROM tb_news_content WHERE image='$img' AND id_news='$id'");
				}
			}

			if (isset($ket)) {
				$i = $get_id;
				foreach ($images as $img) {
					$cut1 = explode(',', $img);
					$save_image = base64_decode($cut1[1]);
					$file = "image_news_".$id."_".$i.".jpg";
					file_put_contents($dir.$file, $save_image);
					mysqli_query($conn, "INSERT INTO tb_news_content VALUES(null, '$id', '$file')");
					$i = $i + 1;
				}
			}

			echo "<script>alert('Berita baru bergasil di sunting ^_^');
			document.location.href='".url('news')."'</script>";
		}
		else {
			echo mysqli_error($conn);
		}
	}
}

// hapus news
if (isset($_POST['delete_news'])) {
	$id = $_POST['id'];
	$news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id='$id'");
	$news_content = mysqli_query($conn, "SELECT * FROM tb_news_content WHERE id_news='$id'");
	$dta = mysqli_fetch_assoc($news);

	$query = "DELETE FROM tb_news WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		$cover = "assets/images/news/cover/".$dta['cover'];
		if (file_exists($cover)) unlink($cover);

		mysqli_query($conn, "DELETE FROM tb_news_content WHERE id_news='$id'");
		foreach ($news_content as $img) {
			$remove = "assets/images/news/content/".$img['image'];
			if (file_exists($remove)) unlink($remove);
		}

		echo "<script>alert('Berita berhasil dihapus +_-');
		document.location.href='".url('news')."'</script>";
	}
}

// tambah dan edit galeery
if (isset($_POST['save_gallery'])) {
	$title = $_POST['title'];
	$edit = false;
	if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != null) {
		$name = $_FILES['image']['name'];
		$tmpname = $_FILES['image']['tmp_name'];
		$name_file = "IMG-PRID-".date('mdy').date('His').".png";
		$edit = true;
	}

	if ($_POST['status'] == null) { // tambah gallery
		$query = "INSERT INTO tb_gallery VALUES(null, '$title', '$name_file')";
		if (mysqli_query($conn, $query)) {
			move_uploaded_file($tmpname,'assets/images/gallery/'.$name_file);
			echo "<script>alert('Gallery baru berhasil ditambah ^_^');
			document.location.href='".url('gallery')."'</script>";
		}
	}
	else { // edit gallery
		$id = $_POST['status'];
		$data = mysqli_query($conn, "SELECT * FROM tb_gallery WHERE id = '$id'");
		$dta = mysqli_fetch_assoc($data);
		if ($edit == true) {
			$image = "assets/images/galeery/".$dta['image'];
			if (file_exists($image)) unlink($image);
			move_uploaded_file($tmpname,'assets/images/gallery/'.$name_file);
		}
		else {
			$name_file = $dta['image'];
		}

		mysqli_query($conn, "UPDATE tb_gallery SET title = '$title', image = '$name_file' WHERE id = '$id'");
		echo "<script>alert('Gallery berhasil diedit ^_^');
		document.location.href='".url('gallery')."'</script>";
	}
}

// hapus gallery
if (isset($_POST['delete_gallery'])) {
	$id = $_POST['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_gallery WHERE id = '$id'");
	$dta = mysqli_fetch_assoc($data);

	$query = "DELETE FROM tb_gallery WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		$image = "assets/images/galeery/".$dta['image'];
		if (file_exists($image)) unlink($image);

		echo "<script>alert('Gallery berhasil dihapus +_-');
		document.location.href='".url('gallery')."'</script>";
	}
}

// Data Admin
if (isset($_POST['simpan_data_admin'])) {
	$edit = false;
	if (isset($_FILES['profil']['name']) && $_FILES['profil']['name'] != null) {
		$name = $_FILES['profil']['name'];
		$tmpname = $_FILES['profil']['tmp_name'];
		$foto_profil = "ADMIN-PRID-".date('mdy').date('His').".png";
		$edit = true;
	}

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = password_hash("admin", PASSWORD_DEFAULT);

	if ($_POST['status'] == 0) { // tambah admin
		$data_user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
		if (mysqli_num_rows($data_user) == 1) {
			$_SESSION['data'] = $_POST;
			echo "<script>alert('Username sudah terdaftar. Masukkan username lain!'); document.location.href='".url('form_add_admin')."'</script>";
			exit();
		}

		$query = "INSERT INTO tb_admin VALUES (null, '$nama', '$email', '$username', '$password', 'default_admin.jpg')";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil ditambah'); document.location.href='".url('data_admin')."'</script>";
			unset($_SESSION['data']);
		}
	}
	else if (isset($_POST['status']) && $_POST['this'] != null) { // edit profil
		$id = $_POST['status'];
		
		$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id = '$id'");
		$dta = mysqli_fetch_assoc($data);
		if ($edit == true) {
			move_uploaded_file($tmpname,'assets/images/admin/'.$foto_profil);
			$foto = str_replace('default_admin', '', $dta['photo']);
			$image = "assets/images/admin/".$foto;
			if (file_exists($image)) unlink($image);
		}
		else $foto_profil = $dta['photo'];

		$this_user = $dta['username'];
		$data_user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' AND username != '$this_user'");
		if (mysqli_num_rows($data_user) == 1) {
			$_SESSION['data'] = $_POST;
			echo "<script>alert('Username sudah terdaftar. Masukkan username lain!'); document.location.href='".url('form_add_admin').'&id='.$id.'&this='.$id."'</script>";
			exit();
		}

		if (isset($_POST['password']) && $_POST['password'] != '') {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$query = "UPDATE tb_admin SET nama = '$nama', email = '$email', username = '$username', password = '$password', photo = '$foto_profil' WHERE id='$id'";
		}
		else {
			$query = "UPDATE tb_admin SET nama = '$nama', email = '$email', username = '$username', photo = '$foto_profil' WHERE id='$id'";
		}

		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Profil berhasil diedit'); document.location.href='".url('profil_admin')."'</script>";
			unset($_SESSION['data']);
		}
	}
	else { // edit admin
		$id = $_POST['status'];
		$query = "UPDATE tb_admin SET nama = '$nama', email = '$email', username = '$username' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil diedit'); document.location.href='".url('data_admin')."'</script>";
		}
	}
}

// hapus admin
if (isset($_POST['hapus_admin'])) {
	$id = $_POST['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
	$dta = mysqli_fetch_assoc($data);
	$query = "DELETE FROM tb_admin WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		$foto = str_replace('default_admin', '', $dta['photo']);
		$image = "assets/images/admin/".$foto;
		if (file_exists($image)) unlink($image);
		echo "<script>alert('Data admin berhasil dihapus +_-'); document.location.href='".url('data_admin')."'</script>";
	}
}

// kirim email
if (isset($_POST['send_mail'])) {
	if (isset($_POST['id']) && isset($_POST['nama'])) {
		$id=$_POST['id'];
		$nama=$_POST['nama'];
	}
	else {
		$nama=$_POST['email'];
	}
	$to=$_POST['email'];
	$subjek=$_POST['subjek'];
	$pesan=$_POST['pesan'];

	//try {
	//	$mail->SMTPDebug = 0;                                     
	//	$mail->isSMTP();                                          
	//	$mail->Host       = 'ssl://smtp.gmail.com';
	//	$mail->SMTPAuth   = true;                                   
	//	$mail->Username   = 'rahmat.ilham44yl@gmail.com';
	//	$mail->Password   = '04-04-1998';                       
	//	$mail->SMTPSecure = 'tls';
	//	$mail->Port       = 465;

        //      $mail->setFrom('rahmat.ilham44yl@gmail.com', 'Perawat.ID');  
	//	$mail->addAddress($email_penerima);           

	//	$mail->isHTML(true);                                
	//	$mail->Subject = $subjek;
	//	$mail->Body    = $pesan;

	//	$mail->send();
	//	if (isset($id)) echo "<script>alert('Pesan berhasil dikirim ^_^'); document.location.href='".url('read_inbox')."&id=".$id."'</script>";
	//	else echo "<script>alert('Pesan berhasil dikirim ^_^'); document.location.href='".url('inbox')."'</script>";
	//	$time = date('Y-m-d H-i-s');
	//	mysqli_query($conn, "INSERT INTO tb_send_message VALUES(null, '$email_penerima', '$subjek', '$pesan', '$time')");
	//} catch (Exception $e) {
	//	if (isset($id)) echo "<script>alert('Terjadi kesalahan pengiriman pesan +_-'); document.location.href='".url('read_inbox')."&id=".$id."'</script>";
	//	else echo "<script>alert('Terjadi kesalahan pengiriman pesan +_-'); document.location.href='".url('write_inbox')."'</script>";
	//}
        
          ini_set( 'display_errors', 1 );   
          error_reporting( E_ALL );  
          $headers = "From: perawat.id";    
          mail($to,$subjek,strip_tags($pesan), $headers);
          if (isset($id)) echo "<script>alert('Pesan berhasil dikirim ^_^'); document.location.href='".url('read_inbox')."&id=".$id."'</script>";
	  else echo "<script>alert('Pesan berhasil dikirim ^_^'); document.location.href='".url('inbox')."'</script>";
	  $time = date('Y-m-d H-i-s');
	  mysqli_query($conn, "INSERT INTO tb_send_message VALUES(null, '$to', '$subjek', '$pesan', '$time')");
          
}

if (isset($_POST['hapus_pesan'])) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		mysqli_query($conn, "DELETE FROM tb_message WHERE id = '$id'");
		echo "<script>alert('Pesan telah terhapus'); document.location.href='".url('inbox')."'</script>";
	}
	else if (isset($_POST['chk'])) {
		foreach ($_POST['chk'] as $id_pesan) {
			mysqli_query($conn, "DELETE FROM tb_message WHERE id = '$id_pesan'");
			echo "<script>alert('Pesan telah terhapus'); document.location.href='".url('inbox')."'</script>";
		}
	}
	else echo "<script>alert('Tidak ada pesan yang di pilih'); document.location.href='".url('inbox')."'</script>";
}

if (isset($_POST['hapus_pesan_terkirim'])) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		mysqli_query($conn, "DELETE FROM tb_send_message WHERE id = '$id'");
		echo "<script>alert('Pesan telah terhapus'); document.location.href='".url('send_inbox')."'</script>";
	}
	else if (isset($_POST['chk'])) {
		foreach ($_POST['chk'] as $id_pesan) {
			mysqli_query($conn, "DELETE FROM tb_send_message WHERE id = '$id_pesan'");
			echo "<script>alert('Pesan telah terhapus'); document.location.href='".url('send_inbox')."'</script>";
		}
	}
	else echo "<script>alert('Tidak ada pesan yang di pilih'); document.location.href='".url('send_inbox')."'</script>";
}

?>