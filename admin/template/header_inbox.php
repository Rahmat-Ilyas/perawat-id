<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title float-left">Inbox</h4>

					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active">Inbox</li>
					</ol>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card-box">
					<div class="inbox-leftbar">

						<a href="<?= url('write_inbox') ?>" class="btn btn-rounded btn-danger btn-block waves-effect waves-light"><i class="fa fa-pencil">&ensp;</i>Tulis Pesan</a>

						<div class="mail-list mt-4">
							<a href="<?= url('inbox') ?>" class="list-group-item border-0 <?= $_SESSION['inbox'] ?>"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Pesan Masuk</b>
								<?php if (isset($jum)) { ?>
									<span class="badge badge-danger float-right ml-2"><?= count($jum) ?></span>
								<?php } ?>
							</a>
							<a href="<?= url('send_inbox') ?>" class="list-group-item border-0 <?= $_SESSION['send_inbox'] ?>"><i class="mdi mdi-send font-18 align-middle mr-2"></i><b>Pesan Terkirim</b></a>
						</div>

					</div>

					<div class="inbox-rightbar">