<?php 
require('config.php');
$gallery = mysqli_query($conn, "SELECT * FROM tb_gallery");
$news = mysqli_query($conn, "SELECT * FROM tb_news ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perawat.ID</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="shortcut icon"  href="images/21.png">
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">
	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- CSS Lightbox -->
	<link href="css/lightbox.css" rel="stylesheet"/>
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}

		/* Button used to open the chat form - fixed at the bottom of the page */
		.open-button {
			background-color: #0000;
			color: white;
			padding: 16px 20px;
			border: none;
			cursor: pointer;
			opacity: 0.8;
			position: fixed;
			bottom: -35px;
			right: 0px;
			width: 126px;
		}

		/* The popup chat - hidden by default */
		.chat-popup {
			display: none;
			position: fixed;
			bottom: 0;
			right: 5px;
			border: 3px solid #f1f1f1;
			z-index: 9;
		}

		/* Add styles to the form container */
		.form-container {
			max-width: 300px;
			padding: 10px;
			background-color: white;
		}

		/* Full-width textarea */
		.form-container textarea {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
			resize: none;
			min-height: 200px;
		}

		/* When the textarea gets focus, do something */
		.form-container textarea:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Set a style for the submit/send button */
		.form-container .btn {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			border: none;
			cursor: pointer;
			width: 100%;
			margin-bottom:10px;
			opacity: 0.8;
		}

		/* Add a red background color to the cancel button */
		.form-container .cancel {
			background-color: red;
		}

		/* Add some hover effects to buttons */
		.form-container .btn:hover, .open-button:hover {
			opacity: 1;
		}
	</style>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<div style="background-color: #1A9FE0;" class="py-1 top">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-lg-2 pr-2 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text"> +62 81242834378</span>
						</div>
						<div class="col-lg-6  pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">info@perawat.id</span>
						</div>
						<div class="col-lg-4 pr-5 d-flex topper justify-content-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon icon-map-marker"></span></div>
							<span class="text">Makassar, Sulawesi Selatan
							Indonesia</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<img class="navbar-brand" src="images/124.png" width="100px" style="padding-right: 10px">
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Beranda</span></a></li>
					<li class="nav-item"><a href="#visimisi-section" class="nav-link"><span>Visi Misi</span></a></li>
					<li class="nav-item"><a href="#tentang-section" class="nav-link"><span>Tentang</span></a></li>
					<li class="nav-item"><a href="#layanan-section" class="nav-link"><span>Layanan</span></a></li>
					<li class="nav-item"><a href="#galeri-section" class="nav-link"><span>Galeri</span></a></li>
					<li class="nav-item"><a href="#news-section" class="nav-link"><span>News</span></a></li>
					<div class="nav-item dropdown"><a href="javascript:;" class="nav-link"><span>Pendaftaran</span></a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="https://docs.google.com/forms/d/e/1FAIpQLSddwPuS0sdiq6Kh5IP2zWxE0ZCfuNOzyUpGA6OS6Xl1a3uPGg/viewform" class="btn btn-primary px-4 py-3" target="_blank">Daftar Jadi Mitra</a>
							<a class="dropdown-item" href="#">Daftar Perawat ke Jepang (JEA)</a>
							<a class="dropdown-item" href="#">Daftar Perawat ke Korea (KEA)</a>
						</div>
					</div>
					<li display : list-item; class="nav-item"><a href="#contact-section" class="nav-link"><span>Kontak</span></a></li>
				</ul>
			</div>
		</div>
	</nav>	
	<section  id="home-section">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/home.jpg" style="height: 670px;" class="d-block w-100" alt="">
				</div>
				<div class="carousel-item">
					<img src="images/image_6.jpg" style="height: 670px" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="images/tangan.jpg" style="height: 670px" class="d-block w-100" alt="...">
				</div>
				<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
					<div  class="col-md-12 pt-10 ftco-animate">
						<div style="text-align: center;" class="mt-12">
							<h1 style="color: white; font-size: 40px;margin-top: 50px" class="mb-4">Selamat datang di Perawat.id</h1>
							<h6 style="color: white; margin-top: 40px; font-size: 20px" class="mb-4">Perawat Indonesia,&nbsp;Merawat dengan hati</h6 style="color: white">
								<button type="button" style="margin-top: 40px;" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalLong">
									Syarat Dan Ketentuan
								</button>&nbsp;
								<a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSddwPuS0sdiq6Kh5IP2zWxE0ZCfuNOzyUpGA6OS6Xl1a3uPGg/viewform" role="button" style="margin-top: 40px;" class="btn btn-lg btn-success">
									Daftar Menjadi Mitra
								</a>								
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Syarat Dan Ketentuan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h5>1. Ketentuan Umum Perawat.ID</h5>
								<label><b>1.1 Tentang Perawat.ID</b></label>
								<p style="font-size: 13px">Perawat.ID merupakan platform online untuk pemesanan jasa perawat di Indonesia yangmenghubungkan pelanggan dengan perawat yang bertujuan untuk memudahkan pelangganmendapatkan perawatan yang sesuai dengan kriteria yang dibutuhkan.Pelanggan adalahindividu atau Corporate yang ingin mendapatkan layanan perawatan dari perawat.ID.Sedangkan perawat di Perawat.ID adalah individu freelance yang melakukan layananperawatan kepada klien. Perawat bertindak sebagai pekerja kontrak lepas kepada pelanggan.Pelanggan dan Perawat disebut sebagai para pengguna perawat.ID.</p>
								<label><b>1.2 Perlindungan Hukum Perawat</b></label>
								<p style="font-size: 13px">Perawat yang menjadi mitra di Perawat.ID mendapatkan perlindungan Hukum danPendampingan dari Tim Hukum Perawat.ID terhadap hal-hal yang berhubungan denganpelecehan/asusila atau hal lainnya yang melanggar hukum yang dilakukan olehpelanggan/client terhadap mitra perawat.</p>
								<h5>2. Pembayaran, Pembatalan dan Pengembalian</h5>
								<label><b>2.1 Pembayaran</b></label>
								<p style="font-size: 13px">Semua pembayaran untuk layanan perawatan yang dipilih harus dilakukan melaluiPerawat.ID sesuai dengan metode pembayaran yang dipilih. Pembayaran yang dilakukandiluar Perawat.ID akan menyebabkan sanksi tidak terbatas pada penangguhan akun dengansegera. Setiap tawaran untuk membayar di luar Perawat.ID dibuat oleh salah satu pihakharus segera dilaporkan ke Perawat.ID.</p>
								<label><b>2.2 Tarif perawat & tindakan layanan</b></label>
								<p style="font-size: 13px">Tarif perawat ditetapkan oleh Perawat.ID.Tarif layanan tidak boleh berubah selama tidakada pemberitahuan/Informasi dari Perawat.ID</p>
								<label><b>2.3 Pengembalian</b></label>
								<p style="font-size: 13px">Semua jumlah biaya yang dilakukan sesudah menggunakan layanan Perawat.ID tidak dapatdikembalikan. Namun, jika Anda merasa tidak puas dengan pengalaman Anda dalammenggunakan layanan Perawat.ID, silahkan menghubungi Customer Service kami.</p>
								<label><b>2.4 Pembatalan</b></label>
								<li style="font-size: 13px">Pembatalan pesanan yang dilakukan dalam waktu 24 jam sebelum tanggal dimulainyajadwal sesi perawatan, maka pembayaran yang akan dikembalikan adalah 50% dari biayajasa tenaga kesehatan untuk setiap sesi pembatalan yang dipilih.</li>
								<li style="font-size: 13px">Pembatalan pesanan yang di lakukan kurang dari 24 jam sebelum perawatan atau saatperawatan telah berlangsung, maka pembayaran jasa tenaga kesehatan tidak dapat dikembalikan kecuali dengan kondisi tertentu dari pasien.</li>
								<li style="font-size: 13px">Jika pembatalan terjadi di karenakan oleh tenaga kesehatan Perawat.ID, maka pihakPerawat.ID akan mencarikan pengganti, tergantung pada ketersediaan. Tetapi jika andatetap ingin membatalkan pesanan, maka pembayaran yang dikembalikan adalah 75% darijumlah sesi perawatan yang tersisa.</li>
								<li style="font-size: 13px">Metode pengembalian dana tergantung pada metode pembayaran yang telah Anda pilih padasaat pemesanan.</li>
								<li style="font-size: 13px">Jika Anda menggunakan metode transaksi bank transfer maka pengembalian dana akanmembutuhkan waktu hingga 7 (tujuh) hari kerja</li>
								<li style="font-size: 13px">Jika Anda menggunakan metode transaksi Tunai maka pengembalian dana akanmembutuhkan waktu hingga 5 (tujuh) hari kerja</li>
								<h5>3. Keluhan</h5>
								<p style="font-size: 13px">Perawat.ID akan menerima semua keluhan pelanggan dan berkomitmen untukmenyelesaikannya sehingga dapat meningkatkan layanan kami untuk kedepannya Jika Andamemiliki keluhan, silakan kirim ini melalui email ke info@perawat.id. Kami akan merespondalam waktu 24 jam (yaitu satu hari kerja). Kami akan menyelidiki semua hal yang diaturdan segera mengambil tindakan yang tepat. Jika Anda memiliki kekhawatiran mengenaikinerja, perilaku atau kompetensi perawat, kami akan menyelidiki kasus ini dan mengambil tindakan proporsional.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="visimisi-section">
				<div class="container">
					<div class="row d-flex">
						<div class="col-md-6 col-lg-5 d-flex">
							<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/about.jpg);">
							</div>
						</div>
						<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
							<div class="py-md-5">
								<div class="row justify-content-start pb-3">
									<div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
										<h2 style="text-align: center; font-size: 36px" class="mb-4">Visi - Misi <span>Perawat.ID</span></h2>
										<h2 style="font-size: 26px;margin-top: 56px" class="mb-4">Visi</h2>
										<p>Memberikan layanan perawat di Indonesia, dengan memberikan kemudahan bagi masyarakat dalam mendapatkan jasa perawatan sehari-hari seperti perawatan lansia, perawatan pasca rumah sakit dan perawatan yang membutuhkan jasa perawat lainnya dengan cepat, serta turut mensejahterakan kehidupan perawat di Indonesia kedepannya</p>
										<h2 style="font-size: 26px;margin-top: 56px" class="mb-4">Misi</h2>
										<p>Menjadikan Perawat.ID sebagai jasa perawatan layaknya keluarga sendiri dengan layanan yang prima dan berkualitas.Menjadikan Perawat.ID sebagai acuan jasa pelayanan perawat yang prima dengan menggunakan kemajuan teknologi.Meningkatkan kepedulian dan tanggung jawab terhadap lingkungan dan sosial.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light"  id="tentang-section">
				<div class="container">
					<div class="row d-flex">
						<div class="col-md-12 py-5">
							<div class="py-lg-5">
								<div class="row justify-content-center pb-5">
									<div class="col-md-12 heading-section ftco-animate">
										<h2 style="text-align: center; margin-top: -10px" class="mb-12">Tentang</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 d-flex align-self-stretch ftco-animate">
										<div class="media block-6 services d-flex">
											<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-24-hours"></span></div>
											<div class="media-body pl-md-4">
												<h3 class="heading mb-6">Layanan Yang cepat</h3>
												<p>Dengan jumlah perawat yang tersedia serta adanya layanan call center, memungkinkan anda dilayani dengan cepat</p>
											</div>
										</div>      
									</div>
									<div class="col-md-6 d-flex align-self-stretch ftco-animate">
										<div class="media block-6 services d-flex">
											<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor"></span></div>
											<div class="media-body pl-md-4">
												<h3 class="heading mb-6">Perawat Berpengalaman</h3>
												<p>Anda akan ditangani oleh perawat yang berpengalaman</p>
											</div>
										</div>      
									</div>
									<div class="col-md-6 d-flex align-self-stretch ftco-animate">
										<div class="media block-6 services d-flex">
											<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-stethoscope"></span></div>
											<div class="media-body pl-md-4">
												<h3 class="heading mb-6">Biaya terjangkau</h3>
												<p>Jasa perawatan yang sangat terjangkau</p>
											</div>
										</div>      
									</div>
									<div class="col-md-6 d-flex align-self-stretch ftco-animate">
										<div class="media block-6 services d-flex">
											<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-ambulance	"></span></div>
											<div class="media-body pl-md-4">
												<h3 class="heading mb-6">Layanan Perawat di tempat anda</h3>
												<p>Perawat akan mendatangi tempat anda dengan layanan profesional</p>
											</div>
										</div>      
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</section>

			<section class="ftco-section ftco-no-pt ftco-no-pb" id="layanan-section">
				<div class="container-fluid px-5">
					<div class="row justify-content-center mb-5 pb-5">
						<div class="col-md-12 heading-section text-center ftco-animate">
							<h2 style="margin-top: 100px">Layanan</h2>
						</div>
					</div>
					<div style="" class="row no-gutters">
						<div class="col-md-12">
							<div class="row no-gutters border">
								<div class="col-md-4">
									<div class="department-wrap p-4 ftco-animate">
										<div class="text p-4 text-center">
											<div class="icon">
												<img src="images/plaster.png" height="100px">
											</div><br>
											<h3><a href="#">Perawatan Luka</a></h3>
										</div>
									</div>									
								</div>
								<div class="col-md-4">
									<div class="department-wrap p-4 ftco-animate">
										<div class="text p-4 text-center">
											<div class="icon">
												<img src="images/elder.png" height="100px">
											</div><br>
											<h3><a href="#">Pendampingan Lansia</a></h3>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="department-wrap p-4 ftco-animate">
										<div class="text p-4 text-center">
											<div class="icon">
												<img src="images/strecher.png" height="100px">
											</div><br>
											<h3><a href="#">Pendampingan Rawat Inap</a></h3>
										</div>
									</div>
								</div>
								<div class="col-md-4">									
									<div class="department-wrap p-4 ftco-animate">
										<div class="text p-4 text-center">
											<div class="icon">
												<img src="images/wheelchair.png" height="100px">
											</div><br>
											<h3><a href="#">Pendampingan Pasien  Stroke</a></h3>
										</div>
									</div>									
								</div>								
								<div class="col-md-4">
									<div class="department-wrap p-4 ftco-animate">
										<div class="text p-4 text-center">
											<div class="icon">
												<img src="images/hospital.png" height="100px">
											</div><br>
											<h3><a href="#">Pendampingan Hospital</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ftco-section" id="galeri-section">
				<div class="container-fluid px-5">
					<div class="row justify-content-center mb-5 pb-2">
						<div class="col-md-8 text-center heading-section ftco-animate">
							<h2 class="mb-4">Galeri</h2>
						</div>
					</div>	
					<div class="row">
						<?php foreach ($gallery as $dta) { ?>
							<div class="col-md-3 ftco-animate p-1">
								<div class="card-box border p-1">
									<a class="example-image-link" href="admin/assets/images/gallery/<?= $dta['image']  ?>" data-lightbox="example-set" data-title="<?= $dta['title'] ?>">
										<div class="staff">
											<div class="img-wrap d-flex align-items-stretch">
												<div class="img align-self-stretch example-image-link" style="background-image: url(admin/assets/images/gallery/<?= $dta['image']  ?>);">
												</div>
											</div>
											<div class="text pt-3 text-left">
												<hr class="m-0 mb-2">
												<h5 class="mb-2 text-center"><?= $dta['title'] ?></h5>
												<div class="faded">
												</div>
											</div>
										</div>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>
				<section class="ftco-section bg-light" id="news-section">
					<div class="container">
						<div class="row justify-content-center mb-5 pb-5">
							<div class="col-md-10 heading-section text-center ftco-animate">
								<h2 class="mb-4">News</h2>
							</div>
						</div>
						<div class="row d-flex">
							<?php foreach ($news as $dta) { 
								$judul = str_replace('.', '', strtolower($dta['title_news']));
								$judul = str_replace(',', '', $judul);
								$link_news = str_replace(' ', '-', $judul) ?>
								<div class="col-md-4 ftco-animate">
									<div class="blog-entry">
										<a href="news.php?title=<?= $link_news ?>" class="block-20" style="background-image: url('admin/assets/images/news/cover/<?= $dta['cover'] ?>');">
										</a>
										<div class="text d-block">
											<div class="meta mb-3">
												<div><a href="#"><span class="icon-calendar mr-1"></span><?= date('l, d F Y', strtotime($dta['created_at'])) ?></a></div>
											</div>
											<h3 class="heading" style="min-height: 100px;"><a href="news.php?title=<?= $link_news ?>"><?= $dta['title_news'] ?></a></h3>
											<p style="min-height: 100px;">
												<?php 
												$string = substr(strip_tags($dta['fill_news']), 0, 121);
												$n = strlen($string);
												if (substr($string, $n-1, $n) != ' ') {
													$str = explode(' ', $string);
													$string_rep = str_replace(' '.end($str), '', $string);
													echo $string_rep."...";
												}
												else echo $string."...";
												?>												
											</p>
											<p><a href="news.php?title=<?= $link_news ?>" class="btn btn-primary py-2 px-3">Read more</a></p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
				<section class="ftco-section contact-section" id="contact-section">
					<div class="container">
						<div class="row justify-content-center mb-5 pb-3">
							<div class="col-md-7 heading-section text-center ftco-animate">
								<h2 class="mb-4">Hubungi Kami</h2>
							</div>
						</div>
						<div class="row no-gutters block-9">
							<div class="col-md-6 order-md-last d-flex">
								<form action="controller.php" method="POST" class="bg-light p-4 contact-form">
									<div class="form-group">
										<input type="text" name="nama" class="form-control" placeholder="Your Name" autocomplete="off" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Your Email" autocomplete="off" required>
									</div>
									<div class="form-group">
										<textarea id="" cols="30" rows="7" name="pesan" class="form-control" placeholder="Message" required></textarea>
									</div>
									<div class="form-group">
										<button type="submit" name="kirim" value="Send Message" class="btn btn-secondary py-3 px-5">Send Message</button>
									</div>
								</form>

							</div>

							<div class="col-md-6 d-flex">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.8884860428552!2d119.44872009884948!3d-5.139573965954534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd32fdb6a739%3A0xd76eeb43efab720e!2sNipah+Mall!5e0!3m2!1sid!2sid!4v1565091079753!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</section>

				<!-- Live Cheat -->
				<div class="col-md open-button" onclick="openForm()" style="z-index: 01">
					<div class="ftco-footer-widget mb-6">
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a style="height: 55px; width: 55px; margin-left: 30px; margin-bottom: 15px;"><span class="icon-message"></span></a></li>	
						</ul>
					</div>
				</div>
				<div class="chat-popup" id="myForm">
					<form method="POST" action="controller.php" class="form-container col-lg-12">	
						<label type="" class="" style="margin-left: 260px; font-size : 20px;" onclick="closeForm()">X</label>
						<center><img src="images/124.png" height="50px"></center><br>
						<label style="margin-right: -70px; font-size: 12px;color:black;">Silahkan Tinggalkan<br> Pesan Anda, Admin Perawat.ID Akan Menjawab.</label>
						<input name="nama" type="text" class="form-control" required placeholder="Your Name" autocomplete="off">
						<input name="email" type="email" style="margin-top: 10px" class="form-control" required placeholder="Your Email" autocomplete="off">
						<textarea name="pesan" style="margin-top: 10px" id="" cols="20" rows="7" class="form-group" required placeholder="Message"></textarea>
						<button type="submit" name="kirim" style="margin-top: -20px;font-size: 15px" value="Send Message" class="btn btn-primary py-3 px-5">Send Message</button>
					</form>
				</div>				

				<footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid px-md-5">
						<div class="row mb-5">					
							<div class="col-md">						
								<div class="ftco-footer-widget mb-4">
									<img class="navbar-brand" src="images/124.png" width="100px" style="margin-bottom: 20px">
									<div class="block-23 mb-3">
										<ul>
											<li ><span class="icon icon-map-marker"></span><span class="text">PO Box 90234
												Makassar, Sulawesi Selatan
											Indonesia</span></li>
											<li><span class="icon icon-phone"></span><span class="text">+62 81242834378</span></li>
											<li><span class="icon icon-envelope pr-4"></span><span class="text">info@perawat.id</span></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="ftco-footer-widget mb-4 ml-md-4">
									<h2 class="ftco-heading-2">Berita Terkini</h2>
									<ul class="list-unstyled">
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Ide perancangan</a><br>&emsp;&nbsp;&nbsp;22 Desember 2017</li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Testing Apps Mobile</a><br>&emsp;&nbsp;&nbsp;1-14 April 2018</li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Sosialisasi Produk</a><br>&emsp;&nbsp;&nbsp;15 > April 2018</li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Launching, Perawat.ID</a><br>&emsp;&nbsp;&nbsp;11 November 2018</li>
									</ul>
								</div>
							</div>
							<div class="col-md">
								<div class="ftco-footer-widget mb-4 ml-md-4">
									<h2 class="ftco-heading-2">Aplikasi Pesan Jasa Perawat Keluarga - PERAWAT.ID</h2>
									<ul class="list-unstyled">
										<section ><li><a href="" id="home-section"><span class="icon-long-arrow-right mr-2"></span>Beranda</a></li></section>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Visi Misi</a></li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Tentang</a></li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Layanan</a></li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Galeri</a></li>
										<li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Kontak</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md">
								<div class="ftco-footer-widget mb-6">
									<h2>Social Media</h2>
									<h2 style="font-size: 16px">Follow Untuk Mendapatkan Informasi Terbaru Dari Kami</h2>
									<ul class="ftco-footer-social list-unstyled mt-2">								
										<li class="ftco-animate"><a href="https://www.facebook.com/perawatkeluarga/"><span class="icon-facebook"></span></a></li>
										<li class="ftco-animate"><a href="https://twitter.com/IdPerawat"><span class="icon-twitter"></span></a></li>
										<li class="ftco-animate"><a href="https://www.youtube.com/watch?v=5s4kiFeX3a4&t=172s"><span class="icon-youtube"></span></a></li>
										<li class="ftco-animate"><a href="https://www.instagram.com/idperawat/"><span class="icon-instagram"></span></a></li>							
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">

								<p>
									© 2019 All Rights Reserved,  <a href="#" target="_blank">Perawat.ID</a>
								</p>
							</div>
						</div>
					</div>
				</footer>

				<!-- loader -->
				<div id="ftco-loader" class="show fullscreen">
					<svg class="circular" width="48px" height="48px">
						<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
						<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
					</svg>
				</div>

				<div class="container">
					<div class="sticky-container">
						<ul class="sticky">
							<li>
								<img src="images/ikon/facebook-circle.png" width="32" height="32">
								<p><a href="https://www.facebook.com/perawatkeluarga/" target="_blank">Sukai kami di<br>Facebook</a></p>
							</li>
							<li>
								<img src="images/ikon/twitter-circle.png" width="32" height="32">
								<p><a href="https://twitter.com/IdPerawat" target="_blank">Ikuti kami di<br>Twitter</a></p>
							</li>
							<li>
								<img src="images/ikon/instagram-circle.png" width="32" height="32">
								<p><a href="https://www.instagram.com/idperawat/" target="_blank">Ikuti kami di<br>Instagram</a></p>
							</li>
							<li>
								<img src="images/ikon/youtube-circle.png" width="32" height="32">
								<p><a href="https://www.youtube.com/watch?v=5s4kiFeX3a4&t=172s" target="_blank">Lihat Kami di<br>YouTube kami</a></p>
							</li>
							<li>
								<img src="images/ikon/playstore-circle.png" width="32" height="32">
								<p><a href="https://play.google.com/store/apps/details?id=com.perawatid.pasien" target="_blank">Download aplikasi di<br>Playstore</a></p>
							</li>
						</ul>
					</div>
				</div>
			</body>
			</html>
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery-migrate-3.0.1.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery.easing.1.3.js"></script>
			<script src="js/jquery.waypoints.min.js"></script>
			<script src="js/jquery.stellar.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/aos.js"></script>
			<script src="js/jquery.animateNumber.min.js"></script>
			<script src="js/scrollax.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="js/google-map.js"></script>

			<script src="js/main.js"></script>
			<script src="js/lightbox-plus-jquery.min.js"></script>

			<link rel="stylesheet" href="css/socialmedia.css">

			<script>
				function openForm() {
					document.getElementById("myForm").style.display = "block";
				}

				function closeForm() {
					document.getElementById("myForm").style.display = "none";
				}
			</script>

			<?php if (isset($_COOKIE['send'])) { ?>
				<link href="admin/assets/plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
				<script src="admin/assets/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
				<script src="admin/assets/pages/jquery.toastr.js" type="text/javascript"></script>
				<script>
					$(document).ready(function() {
						$.toast({
							heading: 'Pesan terkirim!',
							text: 'Pesan anda telah terkirim. Terima kasih.',
							position: 'top-right',
							loaderBg: '#3EC396',
							icon: 'success',
							hideAfter: 3000,
							stack: 1
						});
					});
				</script>
				<?php } ?>