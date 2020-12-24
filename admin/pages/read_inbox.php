<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_message WHERE id = '$id'");
$dta = mysqli_fetch_assoc($data);

if($dta['status'] == 'unread') {
	mysqli_query($conn, "UPDATE tb_message SET status = 'read' WHERE id = '$id'");
	if (mysqli_affected_rows($conn) > 0) {
		echo "<script>document.location.href='".url('read_inbox')."&id=".$id."'</script>";
		exit();
	}
}
require("template/header_inbox.php");
?>

<div class="" role="toolbar">
	<form action="controller.php" method="POST">
		<div class="btn-group">
			<a href="<?= url('inbox') ?>" role="button" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Kembali"><i class="fa fa-mail-reply font-18 vertical-middle mt-1"></i></a>
			<input type="hidden" name="id" value="<?= $dta['id'] ?>">
			<button type="submit" name="hapus_pesan" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Hapus Pesan"><i class="mdi mdi-delete font-18 vertical-middle"></i></button>
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
				<h6 class="m-0"><?= $dta['nama'] ?></h6>
				<small class="text-muted"><?= $dta['email'] ?></small>
			</div>
		</div>

		<p><?= $dta['pesan'] ?></p>
	</div>
	<hr/>
	<h4 class="mt-4">Balas Pesan</h4>
	<form action="controller.php" method="POST">
		<div class="media mt-2">
			<div class="media-body">
				<div class="card-box border">
					<textarea name="pesan" class="summernote"></textarea>
				</div>
			</div>
		</div>
		<div class="text-right pt-0">
			<input type="hidden" name="id" value="<?= $id ?>">
			<input type="hidden" name="nama" value="<?= $dta['nama'] ?>">
			<input type="hidden" name="email" value="<?= $dta['email'] ?>">
			<input type="hidden" name="subjek" value="Balas Komentar">
			<button type="submit" name="send_mail" class="btn btn-success btn-rounded waves-light waves-effect w-md"><i class="fa fa-paper-plane mr-2"></i>Kirim</button>
		</div>
	</form>

</div>

<?php require("template/footer_inbox.php"); ?>