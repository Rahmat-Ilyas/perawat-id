<?php 
if (!isset($_GET['id'])) echo "<script>document.location.href='".url('403')."'</script>";
$id = $_GET['id'];

$news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id='$id'");
if (mysqli_num_rows($news) == 0) echo "<script>document.location.href='".url('404')."'</script>";

$dta = mysqli_fetch_assoc($news);
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">News</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item">News</li>
						<li class="breadcrumb-item active">View</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row m-b-30">
			<div class="col-12">
				<div class="card-box">
					<h2 class="m-b-30 m-t-0 header-title">View News</h2>
					<div class="row justify-content-center">
						<div class="border col-10 pt-3 mb-3">
							<div style="margin-left: 40px; margin-bottom: -12px;">
								<h3 class="mb-3"><?= $dta['title_news'] ?></h3>
								<p><?= date('l, d F Y', strtotime($dta['created_at'])) ?> | <?= date('H:i', strtotime($dta['created_at'])) ?> WITA</p>
							</div>
							<div class="text-center pl-5 pr-5">
								<img class="img-fluid border" style="height: 400px; max-height: 400px; width: 100%;" src="assets/images/news/cover/<?= $dta['cover'] ?>">
							</div>
							<hr>
							<div class="row justify-content-center">
								<div class="col-11 text-justify">
									<?= $dta['fill_news'] ?>
								</div>
							</div>
							<hr>
							<div class="text-center mb-3">
								<a href="<?= url('news') ?>" role="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal"><i class="fa fa-reply mr-2"></i>Kembali</a>
								<a href="<?= url('form_news')."&id=".$dta['id'] ?>" role="button" class="btn btn-primary btn-rounded waves-light waves-effect w-sm"><i class="fa fa-pencil mr-2"></i>Edit</a>
								<button type="button" class="btn btn-danger btn-rounded waves-light waves-effect w-sm" data-toggle="modal" data-target="#hapus<?= $dta['id'] ?>"><i class="fa fa-trash mr-2"></i>Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hapus -->
<div id="hapus<?= $dta['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="mySmallModalLabel">Konfirmasi Hapus</h5>
			</div>
			<div class="modal-body">
				<p>
					Lanjutkan menghapus berita<br>
					<h5>"<?= $dta['title_news'] ?>"?</h5>
				</p>
			</div>
			<div class="modal-footer">
				<form action="controller.php" method="POST">
					<input type="hidden" name="id" value="<?= $dta['id'] ?>">
					<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
					<button type="submit" name="delete_news" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>