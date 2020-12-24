<?php 
if (isset($_GET['id'])) {
    $title = "Edit Gallery";
    $value = $_GET['id'];
    $id = $_GET['id'];

    $gallery = mysqli_query($conn, "SELECT * FROM tb_gallery WHERE id='$id'");
    if (mysqli_num_rows($gallery) == 0) echo "<script>document.location.href='".url('404')."'</script>";
    foreach ($gallery as $dta) {
        $title = $dta['title'];
        $image = $dta['image'];
    }
}
else {
    echo "<script>$(document).ready(function() { $('#image').attr('required', ''); });</script>";
    $title = "Add Gallery";
    $value = null;

    $title = null;
    $image = null;
}
?>
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">Gallery</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item"><a>Gallery</a></li>
						<li class="breadcrumb-item active">Add Gallery</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- end row -->

		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="m-b-30 m-t-0 header-title"><?= $title ?></h4>
					<form method="POST" action="controller.php" class="form-horizontal" role="form" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-3 col-form-label">Judul/Keterangan Gallery</label>
							<div class="col-9">
								<input type="text" name="title" class="form-control" placeholder="Judul Gallery..." autofocus="" value="<?= $title ?>" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3 col-form-label">Image Upload</label>
							<div class="col-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 400px; height: 250px;">
										<?php if (isset($image)): ?>
										<img src="assets/images/gallery/<?= $image ?>" style="width: 100%; height: 100%;" />	
										<?php else: ?>
										<img src="assets/images/images.png" style="width: 100%; height: 100%;" />
										<?php endif ?>
									</div>
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 250px; line-height: 20px;"></div>
									<div>
										<button type="button" class="btn btn-gradient btn-file">
											<span class="fileupload-new"><i class="dripicons-upload mr-2"></i>Pilih Gambar</span>
											<span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti Gambar</span>
											<input type="file" name="image" id="image" class="btn-secondary" />
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-3"></div>
							<div class="col-9 col-form-label">
								<input type="hidden" name="status" value="<?= $value ?>">
								<button type="submit" name="save_gallery" class="btn btn-success btn-rounded waves-light waves-effect w-md"><i class="fa fa-save mr-2"></i>Simpan</button>
								<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-toggle="modal" data-target="#batal"><i class="fa fa-times-circle mr-2"></i>Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End row -->

	</div> <!-- container -->

</div> 

<!-- Modal Batal -->
<div id="batal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="mySmallModalLabel">Batalkan membuat gallery?</h5>
			</div>
			<div class="modal-body">
				<p>
					Semua data yang telah di input akan hilang
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
				<a href="<?= url('gallery') ?>" role="button" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</a>
			</div>
		</div>
	</div>
</div>