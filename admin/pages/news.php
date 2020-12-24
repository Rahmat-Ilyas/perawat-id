<?php 
$news = mysqli_query($conn, "SELECT * FROM tb_news ORDER BY id DESC");
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">News</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active">News</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row m-b-30">
			<div class="col-12">
				<div class="card-box">
					<a href="<?= url('form_news') ?>" role="button" class="btn btn-lg btn-custom btn-rounded waves-light waves-effect w-lg"><i class="dripicons-document-edit"></i>&nbsp;Add News</a>
					<hr>
					<h2 class="text-center mb-3"><u>Daftar Berita</u></h2>
					<div class="card-deck-wrapper">
						<div class="card-deck">
							<?php foreach ($news as $dta) { ?>
								<div class="col-lg-6 mb-3 p-0">
									<div class="card m-b-30 border">
										<img class="card-img-top img-fluid" style="height: 250px;" src="assets/images/news/cover/<?= $dta['cover'] ?>" alt="Card image cap">
										<div class="card-body">
											<h5 class="card-title"><?= $dta['title_news'] ?></h5>
											<p class="card-text">
												<small class="text-muted"><?= date('l, d F Y', strtotime($dta['created_at'])) ?></small>
											</p>
											<hr class="mb-0">
										</div>
										<div class="mb-3 text-center">
											<a href="<?= url('form_news')."&id=".$dta['id'] ?>" role="button" class="btn btn-primary btn-rounded waves-light waves-effect w-sm"><i class="fa fa-pencil mr-2"></i>Edit</a>
											<a href="<?= url('view_news')."&id=".$dta['id'] ?>" role="button" class="btn btn-success btn-rounded waves-light waves-effect w-sm"><i class="fa fa-eye mr-2"></i>View</a>
											<button type="button" class="btn btn-danger btn-rounded waves-light waves-effect w-sm" data-toggle="modal" data-target="#hapus<?= $dta['id'] ?>"><i class="fa fa-trash mr-2"></i>Delete</button>
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
													<button type="submit" name="delete_news" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>