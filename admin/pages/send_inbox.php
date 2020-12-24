<?php
$data = mysqli_query($conn, "SELECT * FROM tb_send_message ORDER BY id DESC");
foreach ($data as $dta) { $count[] = $dta['id']; }

$page = 20;
$countdata = count($count);
$totalpage = ceil($countdata / $page);
$thispage = ( (isset($_GET['page_inbox'])) ? $_GET['page_inbox'] : 1 );
$first = ($page * $thispage) - $page;
$data1 = mysqli_query($conn, "SELECT * FROM tb_send_message ORDER BY id DESC LIMIT $first, $page");

$_SESSION['send_inbox'] = "text-danger";
$_SESSION['inbox'] = "";
require("template/header_inbox.php");
?>

<form method="POST" action="controller.php">
	<div class="" role="toolbar">
		<div class="btn-group">
			<button type="button" class="btn btn-light waves-effect" id="check_all" data-toggle1="tooltip" title="Pilih Semua"><i class="mdi mdi-checkbox-marked-outline font-18 vertical-middle"></i></button>
			<button hidden type="button" class="btn btn-light waves-effect" id="uncheck_all" data-toggle1="tooltip" title="Batalkan Pilihan"><i class="mdi mdi-close-box-outline font-18 vertical-middle"></i></button>
			<button type="submit" name="hapus_pesan_terkirim" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Hapus Pilihan"><i class="mdi mdi-delete font-18 vertical-middle"></i></button>
			<a href="<?= url('send_inbox') ?>" role="button" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Segarkan"><i class="mdi mdi-refresh font-18 vertical-middle"></i></a>
		</div>
	</div>
	<h4 class="mt-4">Pesan Terkirim</h4>
	<div class="border mt-3">
		<div class="mt-0">
			<div class="">
				<ul class="message-list">
					<?php foreach ($data as $dta) { ?>
						<li class="<?= $dta['status'] ?>">
							<a href="<?= url('detail_send_inbox').'&id='.$dta['id'] ?>">
								<div class="col-mail col-mail-1">
									<div class="checkbox-wrapper-mail">
										<input type="checkbox" class="chk" name="chk[]" value="<?= $dta['id'] ?>" id="chk<?= $dta['id'] ?>">
										<label for="chk<?= $dta['id'] ?>" class="toggle"></label>
									</div>
									<p class="title" style="margin-left: -40px;"><b>Kepada: <?= $dta['email_tujuan'] ?></b></p>
								</div>
								<div class="col-mail col-mail-2">
									<div class="subject pl-3 mr-0" style="width: 350px;">
										<span><?= "<b>".$dta['subjek'].'</b> - '.strip_tags($dta['pesan']) ?></span>
									</div>
									<div class="date">
										<?php 
										$date = date('Y-m-d');
										$created_at = $dta['created_at'];
										$sls = strtotime($date) - strtotime($created_at);
										$hari = $sls/(60*60*24)+1;
										if ($hari > 1) 
											echo date('d M', strtotime($created_at));
										else
											echo date('H:i', strtotime($created_at));
										?>
									</div>
								</div>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-7">
				Showing 1 - 20 of <?= $countdata ?>
			</div>
			<div class="col-5">
				<div class="btn-group float-right">
					<?php 
					$next = $thispage + 1;
					$back = $thispage - 1;
					if ($next > $totalpage) $next = $totalpage;
					if ($back < 1) $back = 1;
					?>
					<a href="<?= url('send_inbox')."&page_inbox=".$back ?>" data-toggle1="tooltip" title="Back"><button type="button" class="btn btn-gradient waves-effect" <?php if ($thispage == 1) echo "disabled"; ?> ><i class="fa fa-chevron-left"></i></button></a>
					<a href="<?= url('send_inbox')."&page_inbox=".$next ?>"  data-toggle1="tooltip" title="Next"><button type="button" class="btn btn-gradient waves-effect" <?php if ($thispage == $totalpage) echo "disabled"; ?> ><i class="fa fa-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
	</div>
</form>

<?php require("template/footer_inbox.php"); ?>

<script>
	$(document).ready(function() {
		$(document).on('click', '#check_all', function() {
			$('#check_all').attr('hidden', '');
			$('#uncheck_all').removeAttr('hidden', '');
			$('.chk').attr('checked', '');
		});
		$(document).on('click', '#uncheck_all', function() {
			$('#uncheck_all').attr('hidden', '');
			$('#check_all').removeAttr('hidden', '');
			$('.chk').removeAttr('checked', '');
		});
	});
</script>