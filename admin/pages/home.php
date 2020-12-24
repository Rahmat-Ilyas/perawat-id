<script>
    $(document).ready(function() {
        if ((screen.width < 1024) && (screen.height < 768)) {
            alert('Halaman ini mungkin tidak berjalan dengan baik di browser ini');
            document.location.href='pages/403_alt.php';
        }
    });
</script>
<?php
if (isset($_SESSION['this'])) $id = $_SESSION['this'];
else $id = $_COOKIE['this'];

$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
$dta = mysqli_fetch_assoc($data);

$nama = $dta['nama'];
$password = $dta['password'];

if (password_verify("admin", $password)) $show = true;

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Home</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($show)): ?>    
                <div class="col-xl-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <b>Peringatan!!!</b> Anda sedang login dengan password default! Ganti password anda 
                        <a href="<?= url('form_add_admin').'&id='.$id.'&this='.$id.'&from=home' ?>"><b>DISINI</b></a>
                    </div>
                </div>
            <?php endif ?>
            <div class="col-xl-12">
                <div class="card-box text-center">
                    <img src="assets/images/logo_prid.png" style="width: 40%; height: 200px;" alt="">
                    <hr class="mb-5">
                    <h1 class="mb-3">Hi, <?= $nama ?></h1>
                    <h2 class="mb-4">Selamat datang di halaman Admin Perwat.ID</h2>
                </div>
            </div>
        </div>
    </div>
</div>