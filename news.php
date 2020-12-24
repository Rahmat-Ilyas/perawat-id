<?php 
require('config.php');
$title = $_GET['title'];
$get_news = mysqli_query($conn, "SELECT * FROM tb_news");
$id = null;
foreach ($get_news as $gn) {
  $judul = str_replace('.', '', strtolower($gn['title_news']));
  $judul = str_replace(',', '', $judul);
  $link_news = str_replace(' ', '-', $judul);
  if ($link_news == $title) {
    $id = $gn['id'];
  }
}

if (isset($_POST['cari'])) {
  $cr = $_POST['cari'];
  $more_news = mysqli_query($conn, "SELECT * FROM tb_news WHERE title_news LIKE '%$cr%' ORDER BY id DESC");
  $ket = "Hasil Pencarian";
}
else{
  $more_news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id != '$id' ORDER BY id DESC");
  $ket = "Berita Lainnya";
}

$news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id='$id'");
$dta = mysqli_fetch_assoc($news);

if ($id == null) header("location: 404.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News Perawat.ID - <?= $dta['title_news'] ?></title>
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
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/socialmedia.css">
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
        <li class="nav-item"><a href="index.php" class="nav-link"><span>Beranda</span></a></li>
        <li class="nav-item"><a href="index.php#visimisi-section" class="nav-link"><span>Visi Misi</span></a></li>
        <li class="nav-item"><a href="index.php#tentang-section" class="nav-link"><span>Tentang</span></a></li>
        <li class="nav-item"><a href="index.php#layanan-section" class="nav-link"><span>Layanan</span></a></li>
        <li class="nav-item"><a href="index.php#galeri-section" class="nav-link"><span>Galeri</span></a></li>
        <li class="nav-item"><a href="index.php#news-section" class="nav-link"><span>News</span></a></li>
        <div class="nav-item dropdown"><a href="javascript:;" class="nav-link"><span>Pendaftaran</span></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="https://docs.google.com/forms/d/e/1FAIpQLSddwPuS0sdiq6Kh5IP2zWxE0ZCfuNOzyUpGA6OS6Xl1a3uPGg/viewform" class="btn btn-primary px-4 py-3" target="_blank">Daftar Jadi Mitra</a>
            <a class="dropdown-item" href="#">Daftar Perawat ke Jepang (JEA)</a>
            <a class="dropdown-item" href="#">Daftar Perawat ke Korea (KEA)</a>
          </div>
        </div>
        <li class="nav-item"><a href="index.php#contact-section" class="nav-link"><span>Kontak</span></a></li>
      </ul>
    </div>
  </div>
</nav>
<section class="ftco-section">
  <div class="container border-top">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2><?= $dta['title_news'] ?></h2>
        <div class="mb-3" style="font-size: 14px;">
          <span class="icon-calendar mr-1"></span><?= date('l, d F Y', strtotime($dta['created_at'])) ?>
        </div>
        <p>
          <img src="admin/assets/images/news/cover/<?= $dta['cover'] ?>" alt="" class="img-fluid">
        </p>
        <?php 
        $fill_news = $dta['fill_news'];
        echo str_replace('assets', 'admin/assets', $fill_news);
        ?>
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box mb-0">
          <form action="" method="POST" class="search-form">
            <div class="form-group">
              <span class="icon icon-search"></span>
              <input type="text" name="cari" class="form-control" placeholder="Cari berita lainnya disini">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <h3 class="heading-sidebar"><?= $ket ?></h3>
          <?php if(mysqli_num_rows($more_news) == 0){ ?>
            <i>Artikel tidak ditemukan</i>
          <?php } ?>
          <?php foreach ($more_news as $mn) { 
            $judul = str_replace('.', '', strtolower($mn['title_news']));
            $judul = str_replace(',', '', $judul);
            $link_news = str_replace(' ', '-', $judul) ?>
            <div class="block-21 mb-4 d-flex">
              <a href="news.php?title=<?= $link_news ?>" class="blog-img mr-4" style="background-image: url(admin/assets/images/news/cover/<?= $mn['cover'] ?>);"></a>
              <div class="text">
                <h3 class="heading"><a href="news.php?title=<?= $link_news ?>"><?= $mn['title_news'] ?></a></h3>
                <div class="meta">
                  <div class="mb-3" style="font-size: 14px;">
                    <span class="icon-calendar mr-1"></span><?= date('l, d F Y', strtotime($mn['created_at'])) ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Live Cheat -->
<div class="col-md open-button" onclick="openForm()" style="z-index: 01">
  <div class="ftco-footer-widget mb-6">
    <ul class="ftco-footer-social list-unstyled mt-2">
      <li class="ftco-animate"><a style="height: 55px; width: 55px; margin-left: 30px; margin-bottom: 5px;"><span class="icon-message"></span></a></li>  
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
    <input type="hidden" name="judul" value="<?= $title ?>">
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
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
<link rel="stylesheet" href="css/socialmedia.css">
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

<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>

</body>
</html>