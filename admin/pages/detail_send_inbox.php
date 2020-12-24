<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_send_message WHERE id = '$id'");
$dta = mysqli_fetch_assoc($data);
require("template/header_inbox.php");
?>

<div class="" role="toolbar">
	<form action="controller.php" method="POST">
		<div class="btn-group">
			<a href="<?= url('send_inbox') ?>" role="button" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Kembali"><i class="fa fa-mail-reply font-18 vertical-middle mt-1"></i></a>
			<input type="hidden" name="id" value="<?= $dta['id'] ?>">
			<button type="submit" name="hapus_pesan_terkirim" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Hapus Pesan"><i class="mdi mdi-delete font-18 vertical-middle"></i></button>
		</div>
	</form>
</div>

<div class="">
	<div class="mt-4">
		<hr>
		<div class="media mb-4 mt-1">
			<div class="media-body">
				<span class="pull-right">
					<?php 
					$date = date('Y-m-d');
					$created_at = $dta['created_at'];
					$sls = strtotime($date) - strtotime($created_at);
					$hari = $sls/(60*60*24)+1;
					if ($hari > 1) 
						echo date('M d', strtotime($created_at));
					else
						echo date('H:i', strtotime($created_at));
					?>	
				</span>
				<h6 class="m-0">Perawat.ID</h6>
				<small class="text-muted">Kepada: <?= $dta['email_tujuan'] ?></small><br>
				<small>Subjek: <?= $dta['subjek'] ?></small>
			</div>
		</div>

		<p><?= $dta['pesan'] ?></p>
	</div>
	<hr/>
</div>

<?php require("template/footer_inbox.php"); ?>