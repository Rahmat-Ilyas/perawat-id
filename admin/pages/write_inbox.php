<?php
$_SESSION['send_inbox'] = "";
$_SESSION['inbox'] = "";
require("template/header_inbox.php");
?>
<div class="" role="toolbar">
    <div class="btn-group">
        <a href="<?= url('inbox') ?>" role="button" class="btn btn-light waves-effect" data-toggle1="tooltip" title="Batalkan"><i class="mdi mdi-close-circle font-18 vertical-middle mt-1"></i></a>
    </div>
</div>
<h4 class="mt-4">Tulis Pesan</h4>
<hr>
<div class="mt-4">
    <form action="controller.php" method="POST">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="To" autocomplete="off">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="subjek" placeholder="Subject" autocomplete="off">
        </div>
        <div class="media mt-2">
            <div class="media-body">
                <div class="card-box border">
                    <textarea name="pesan" class="summernote"></textarea>
                </div>
            </div>
        </div>
        <div class="text-right pt-0">
            <button type="submit" name="send_mail" class="btn btn-success btn-rounded waves-light waves-effect w-md"><i class="fa fa-paper-plane mr-2"></i>Kirim</button>
        </div>
    </form>
</div>
<?php require("template/footer_inbox.php"); ?>