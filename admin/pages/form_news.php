<?php 
if (isset($_GET['id'])) {
    $titel = "Edit News";
    $value = $_GET['id'];
    $id = $_GET['id'];

    $news = mysqli_query($conn, "SELECT * FROM tb_news WHERE id='$id'");
    if (mysqli_num_rows($news) == 0) echo "<script>document.location.href='".url('404')."'</script>";
    foreach ($news as $dta) {
        $title_news = $dta['title_news'];
        $cover = $dta['cover'];
        $fill_news = $dta['fill_news'];
    }
}
else {
    echo "<script>$(document).ready(function() { $('#cover').attr('required', ''); });</script>";
    $titel = "Add News";
    $value = null;

    $title_news = null;
    $cover = null;
    $fill_news = null;
}
?>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">News</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a>News</a></li>
                        <li class="breadcrumb-item active">Add News</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-b-30 m-t-0 header-title"><?= $titel ?></h4>
                    <form method="POST" action="controller.php" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Judul Berita</label>
                            <div class="col-10">
                                <input type="text" name="title_news" class="form-control" placeholder="Judul Berita..." autofocus="" value="<?= $title_news ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Foto Sampul</label>
                            <div class="col-10 col-form-label">
                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-bottom: -30px;">
                                    <div class="mb-2">
                                        <button type="button" class="btn btn-custom btn-rounded btn-file waves-light waves-effect w-md">
                                            <span class="fileupload-new"><i class="dripicons-upload mr-2"></i>Upload Gambar</span>
                                            <span class="fileupload-exists"><i class="dripicons-clockwise mr-2"></i> Ganti Gambar</span>
                                            <input type="file" name="cover" id="cover" class="btn-secondary"/>
                                        </button>
                                    </div>

                                    <?php if (isset($cover)) { ?>    
                                        <div class="fileupload-new thumbnail" style="width: 500px; height: 350px;">
                                            <img src="assets/images/news/cover/<?= $cover ?>" alt="image" />
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 350px; line-height: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="sticky">
                            <label class="col-12 col-form-label text-center"><h5>Write News Here</h5></label>
                            <div class="col-12">
                                <textarea name="fill_news" class="summernote" required><?= $fill_news ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-form-label">
                                <input type="hidden" name="status" value="<?= $value ?>">
                                <button type="submit" name="posting" class="btn btn-success btn-rounded waves-light waves-effect w-md"><i class="fa fa-paper-plane mr-2"></i>Posting</button>
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
                <h5 class="modal-title" id="mySmallModalLabel">Batalkan membuat berita?</h5>
            </div>
            <div class="modal-body">
                <p>
                    Semua data yang telah di input akan hilang
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-rounded waves-light waves-effect w-md" data-dismiss="modal">Batal</button>
                <a href="<?= url('news') ?>" role="button" class="btn btn-danger btn-rounded waves-light waves-effect w-md">Ok</a>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     $(document).scroll(function() {
    //         var sticky = $('#sticky').offset().top;
    //         var scroll = $(document).scrollTop();
    //         if (scroll >= sticky) {
    //             $('#sticky').attr('class', 'sticky-top')
    //         }
    //     });
    // });
</script>