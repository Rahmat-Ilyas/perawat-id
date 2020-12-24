<?php
if (isset($_SESSION['this'])) $id = $_SESSION['this'];
else $id = $_COOKIE['this'];

$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
$dta = mysqli_fetch_assoc($data);

$id = $dta['id'];
$nama = $dta['nama'];
$email = $dta['email'];
$foto = $dta['photo'];
$username = $dta['username'];
?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">Data Admin</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active">Data Admin</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-6">
							<div class="card m-b-30 border text-center">
								<div class="card-body">
									<img class="img-fluid rounded-circle" style="max-height: 150px; width: 150px;" src="assets/images/admin/<?= $foto ?>" alt="Foto">
									<h2 class="card-title text-primary"><?= $nama ?></h2>
									<hr>
									<h4 class="">About Me</h4>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><b>Nama Lengkap: </b><?= $nama ?></li>
									<li class="list-group-item"><b>Email: </b><?= $email ?></li>
									<li class="list-group-item"><b>Username: </b><?= $username ?></li>
								</ul>
								<div class="card-body">
									<a href="<?= url('form_add_admin').'&id='.$id.'&this='.$id.'&from=profil_admin' ?>" role="button" class="btn btn-primary waves-effect waves-light">
										<i class="fa fa-pencil"></i>&nbsp; Edit Profile
									</a>
									<a href="config.php?logout=true" role="button" class="btn btn-danger waves-effect waves-light">
										&nbsp;&nbsp;<i class="fa fa-power-off"></i>&nbsp; Sign Out&nbsp;&nbsp;
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>