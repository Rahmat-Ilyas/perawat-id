<?php 
$value = 0;
$value1 = 0;
$nama = null;
$email = null;
$username = null;
$foto = null;
echo "<script>$(document).ready(function(){ $('#set_password').attr('hidden', ''); $('#note').attr('hidden', ''); $('#upload_foto').attr('hidden', ''); });</script>";

if (isset($_GET['id']) && isset($_GET['this'])) {
	echo "<script>$(document).ready(function(){ $('#set_password').removeAttr('hidden', ''); $('#upload_foto').removeAttr('hidden', ''); });</script>";
	$titel = "Edit Profil";
	$value = $_GET['id'];
	$value1 = $_GET['id'];

	$id = $_GET['id'];
	if (isset($_SESSION['this'])) $this_id = $_SESSION['this'];
	else $this_id = $_COOKIE['this'];
	
	if ($id != $this_id) {
		echo "<script>document.location.href='".url('403')."'</script>";
		exit();
	}
	
	$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
	foreach ($data as $dta) {
		$nama = $dta['nama'];
		$email = $dta['email'];
		$username = $dta['username'];
		$foto = $dta['photo'];
	}
}
else if (isset($_GET['id'])) {
	echo "<script>$(document).ready(function(){ $('#username').attr('readonly', '') });</script>";
	$titel = "Edit Admin";
	$value = $_GET['id'];
	$value1 = null;

	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
	foreach ($data as $dta) {
		$nama = $dta['nama'];
		$email = $dta['email'];
		$username = $dta['username'];
	}
}
else {
	echo "<script>$(document).ready(function(){ $('#note').removeAttr('hidden', ''); });</script>";
	$titel = "Tambah Admin";
}

if (isset($_SESSION['data'])) {
	$nama = $_SESSION['data']['nama'];
	$email = $_SESSION['data']['email'];
}
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">Add Admin</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active">Data Admin</li>
						<li class="breadcrumb-item active">Add Admin</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card-box">
					<h4 class="m-t-0 header-title text-center" style="margin-bottom: 20px;"><b><?= $titel ?></b></h4>
					<hr>
					<form class="form-horizontal" role="form" method="POST" action="controller.php" enctype="multipart/form-data">
						<div class="form-group row justify-content-center">
							<label class="col-2 col-form-label">Nama Admin</label>
							<div class="col-5">
								<input type="text" required class="form-control" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Admin" autocomplete="off">
							</div>
						</div>
						<div class="form-group row justify-content-center">
							<label class="col-2 col-form-label">Email</label>
							<div class="col-5">
								<input type="email" required class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Email" autocomplete="off">
							</div>
						</div>
						<div class="form-group row justify-content-center">
							<label class="col-2 col-form-label">Username</label>
							<div class="col-5">
								<input type="text" required class="form-control username" name="username" id="username" value="<?= $username ?>" placeholder="Username" autocomplete="off">
							</div>
						</div>
						<div id="set_password" hidden>
							<div class="form-group row justify-content-center">
								<label class="col-2 col-form-label"></label>
								<a href="javascript:;" class="col-5" id="ganti_password">Ganti Password?</a>
								<a href="javascript:;" hidden class="col-5" id="batal_ganti">Batalkan Ganti Password?</a>
							</div>
							<div class="form-group row justify-content-center" hidden id="pass">
								<label class="col-2 col-form-label">Password Baru</label>
								<div class="col-5" id="form_pass">
									<input type="text" class="form-control password" name="password" id="password" value="" placeholder="Password Baru" autocomplete="off">
								</div>
							</div>
						</div>
						<div hidden class="form-group row justify-content-center" id="upload_foto">
							<label class="col-2 col-form-label">Foto Profil</label>
							<div class="col-3 text-center">
								<div class="fileupload fileupload-new" style="margin-left: -90px;" data-provides="fileupload">
									<div class="fileupload-new thumbnail rounded-circle border" style="width: 160px; height: 150px;">
										<?php if (isset($foto)): ?>
											<img src="assets/images/admin/<?= $foto ?>" alt="image" style="width: 100%"/>
											<?php else : ?>
												<img src="assets/images/admin/default_admin.jpg" alt="image" style="width: 100%" />
											<?php endif ?>
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail rounded-circle border" style="width: 160px; height: 150px;"></div>
										<div>
											<button type="button" class="btn btn-gradient btn-file">
												<span class="fileupload-new"><i class="dripicons-upload mr-2"></i> Pilih Foto</span>
												<span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti Foto</span>
												<input type="file" name="profil" class="btn-secondary"/>
											</button>
										</div>
									</div>
								</div>
								<div class="col-2"></div>
							</div>
							<div hidden class="form-group row justify-content-center mb-0 pb-0" id="note">
								<label class="col-2 col-form-label"></label>
								<p class="col-5 text-success">Note: Password default adalah "admin"</p>
							</div>
							<div class="form-group row justify-content-center">
								<div class="col-2"></div>
								<div class="col-5 col-form-label">
									<input type="hidden" name="status" value="<?= $value ?>">
									<input type="hidden" name="this" value="<?= $value1 ?>">
									<button type="submit" name="simpan_data_admin" class="btn btn-success btn-rounded waves-light waves-effect w-md"><i class="fa fa-save mr-2"></i>Simpan</button>
									<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-toggle="modal" data-target="#batal"><i class="fa fa-times-circle mr-2"></i>Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Batal -->
	<div id="batal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="mySmallModalLabel">Batalkan menambah admin?</h5>
				</div>
				<div class="modal-body">
					<p>
						Semua data yang telah di input akan hilang
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
					<?php 
					if (isset($_GET['from'])) $back = $_GET['from'];
					else $back = 'data_admin';
					?>
					<a href="<?= url($back) ?>" role="button" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</a>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#ganti_password').click(function() {
				$('#pass').removeAttr('hidden', '');
				$('#ganti_password').attr('hidden', '');
				$('#batal_ganti').removeAttr('hidden', '');
			});

			$('#batal_ganti').click(function() {
				$('#pass').attr('hidden', '');
				$('#ganti_password').removeAttr('hidden', '');
				$('#batal_ganti').attr('hidden', '');
				$('#password').val('');
			});
		});
	</script>