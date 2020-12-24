<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_gallery");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Gallery</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row m-b-30">
            <div class="col-12">
                <div class="card-box">
                    <a href="<?= url('form_gallery') ?>" role="button" class="btn btn-lg btn-custom btn-rounded waves-light waves-effect w-lg"><i class="dripicons-document-edit"></i>&nbsp;Add Gallery</a>
                    <hr>
                    <h2 class="text-center"><u>Gallery</u></h2>
                    <div class="row p-1">
                        <?php foreach ($data as $dta) { ?>
                            <div class="col-md-4 p-1">
                                <div class="card-box border p-1">
                                    <img src="assets/images/gallery/<?= $dta['image'] ?>" class="card-img-top img-fluid border" style="height: 240px; width: 100%">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-sm-5"><hr class="mt-4"></div>
                                        <div class="col-sm-2 p-0 text-center">
                                            <a href="" role="button" class="btn btn-lg btn-custom btn-rounded waves-light waves-effect"><i class="fa fa-image fa-lg mt-2 mb-2"></i></a>
                                        </div>
                                        <div class="col-sm-5"><hr class="mt-4"></div>
                                    </div>
                                    <h6 class="text-muted text-center"><b><?= $dta['title'] ?></b></h6>
                                    <p class="text-center mb-2">
                                        <a href="<?= url('form_gallery')."&id=".$dta['id'] ?>" class="btn btn-sm btn-primary">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $dta['id'] ?>"></i>Delete</button>
                                    </p>
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
                                                Lanjutkan menghapus gallery ini?<br>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="controller.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                <button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete_gallery" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</button>
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