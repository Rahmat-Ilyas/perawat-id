<?php
if (isset($_SESSION['this'])) $id = $_SESSION['this'];
else $id = $_COOKIE['this'];

$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id != $id");
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
					<div style="margin-bottom: 10px;">
						<a href="<?= url('form_add_admin') ?>" role="button" class="btn btn-primary waves-effect waves-light tambah">
							<i class="fa fa-plus-square"></i>&nbsp;Tambah Admin
						</a>
					</div>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Email</th>
							<th>Username</th>
							<th style="max-width: 100px;">Action</th>
						</thead>

						<tbody>
							<?php $no = 1; foreach ($data as $dta) : ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $dta['nama'] ?></td>
								<td><?= $dta['email'] ?></td>
								<td><?= $dta['username'] ?></td>
								<td class="text-center">
									<a href="<?= url('form_add_admin') ?>&id=<?= $dta['id'] ?>" role="button" class="btn btn-success waves-effect waves-light edit" data-toggle1="tooltip" title="Edit">
										<i class="fa fa-edit"></i>
									</a>
									<button class="btn btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus<?= $dta['id'] ?>" data-toggle1="tooltip" title="Hapus">
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
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
												Lanjutkan menghapus admin "<?= $dta['username'] ?>"?<br>
											</p>
										</div>
										<div class="modal-footer">
											<form action="controller.php" method="POST">
												<input type="hidden" name="id" value="<?= $dta['id'] ?>">
												<button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
												<button type="submit" name="hapus_admin" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php $no = $no + 1; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>