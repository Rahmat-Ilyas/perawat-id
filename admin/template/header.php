<?php 
if (isset($_SESSION['this'])) $id = $_SESSION['this'];
else $id = $_COOKIE['this'];

$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
$dta = mysqli_fetch_assoc($data);

$inbox = mysqli_query($conn, "SELECT * FROM tb_message WHERE status='unread'  ORDER BY id DESC");
foreach ($inbox as $inb) { $jum[] = $inb['id']; }

if (!isset($jum)) {
    $inbox = mysqli_query($conn, "SELECT * FROM tb_message ORDER BY id DESC LIMIT 5");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Admin : Perawat.ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/fav.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

    <!-- Plugins -->
    <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                        <img src="assets/images/logo_prid.png" alt="" height="50">
                    </span>
                    <i>
                        <img src="assets/images/logo_kecil.png" alt="" height="40">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="fi-speech-bubble noti-icon"></i>
                        <?php if (isset($jum)) { ?>
                            <span class="badge badge-danger badge-pill noti-icon-badge"><?= count($jum) ?></span>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h6 class="m-0"><span class="float-right"> </span>Inbox</h6>
                        </div>

                        <div class="slimscroll" style="max-height: 190px;">
                            <?php foreach ($inbox as $msg) { ?>
                                <a href="<?= url('read_inbox').'&id='.$msg['id'] ?>" class="dropdown-item notify-item">
                                   <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                   <p class="notify-details"><?= $msg['nama'] ?></p>
                                   <p class="text-muted font-13 mb-0 user-msg">
                                    <?php 
                                    $teks = $msg['pesan'];
                                    if (strlen($teks) >= 50) echo substr($teks, 0,50)." ...";
                                    else echo $teks;
                                    ?>
                                </p>
                            </a>
                        <?php } ?>
                    </div>

                    <!-- All-->
                    <a href="<?= url('inbox') ?>" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/admin/<?= $dta['photo'] ?>" alt="user" class="rounded-circle"> <span class="ml-1"><?= $dta['nama'] ?> <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="<?= url('profil_admin') ?>" class="dropdown-item notify-item">
                    <i class="fi-head"></i> <span>Profil</span>
                </a>

                <!-- item-->
                <a href="<?= url('data_admin') ?>" class="dropdown-item notify-item">
                    <i class="fi-paper"></i> <span>Data Admin</span>
                </a>

                <!-- item-->
                <a href="config.php?logout=true" class="dropdown-item notify-item">
                    <i class="fi-power"></i> <span>Logout</span>
                </a>

            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="hide-phone app-search">
            <form role="search" class="" action="web.php">
                <input type="text" placeholder="Search..." class="form-control ml-3">
                <a href="web.php"><i class="fa fa-search"></i></a>
            </form>
        </li>
    </ul>

</nav>

</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="<?= url('home') ?>"><i class="dripicons-home"></i>Home</a>
                </li>
                <li>
                    <a href="<?= url('news') ?>"><i class="dripicons-article"></i>Mangae News</a>
                </li>
                <li>
                    <a href="<?= url('gallery') ?>"><i class="fi-image"></i>Gallery</a>
                </li>
                <li>
                    <a href="<?= url('inbox') ?>">
                        <i class="fi-mail"></i>
                        <?php if (isset($jum)) { ?>
                            <span class="badge badge-danger badge-pill pull-right"><?= count($jum) ?></span>
                        <?php } ?>
                        <span> Inbox </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

