<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png'); ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/skins/_all-skins.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css" type="text/css">
    <!-- JavaScript -->
    <script src="<?= base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/adminlte/js/adminlte.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <link  rel="stylesheet" src="<?= base_url(); ?>assets/jquery.js" type="text/javascript"></link>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <!-- Sertakan SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    
</head>

<body class="hold-transition skin-blue sidebar-mini bg-gradient-info">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= base_url('dashboard'); ?>" class="logo">
                <span class="logo-mini"><b>S</b></span>
                <span class="logo-lg"><img src="<?= base_url('assets/images/logo.png'); ?>" width="23"
                        alt="SIMPENDUK"><b> DESA PERNING</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>

                </a>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Selamat datang <?= $this->session->userdata('nama_petugas'); ?>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                        <li>
                                <a href="<?= base_url('Dashboard'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                                <a href="<?= base_url('penduduk'); ?>">
                                <i class="fa fa-address-card-o"></i>
                                <span>Data Penduduk</span></a>
                        </li>
                        <li>
                                <a href="<?= base_url('pindah'); ?>">
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                <span>Data Penduduk Pindah</span></a>
                        </li>
                        <li class="treeview">
                                <a href="">
                                        <i class="fa fa-address-card-o"></i>
                                        <span>PKH</span>
                                        <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                </a>
                                <ul class="treeview-menu">
                                        <li>
                                                <a href="<?= base_url('pkh/tampil'); ?>">
                                                <i class="fa fa-address-card-o"></i>
                                                <span>Klasifikasi PKH</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('pkh'); ?>">
                                                <i class="fa fa-address-card-o"></i>
                                                <span>Penerima PKH</span></a>
                                        </li>
                                </ul>
                        </li>
                        <li class="treeview">
                                <a href="">
                                        <i class="fa fa-envelope-o"></i>
                                        <span>Layanan Surat</span>
                                        <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                </a>
                                <ul class="treeview-menu">
                                        <li>
                                                <a href="<?= base_url('sktm'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SKTM</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('domisili'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Domisili</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('belum_menikah'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Belum Menikah</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('menikah'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Menikah</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('cerai_mati'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Cerai Mati</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('usaha'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Usaha</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('penghasilan'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>SK Penghasilan</span></a>
                                        </li>
                                        <li>
                                                <a href="<?= base_url('pemasangan_listrik'); ?>">
                                                <i class="fa fa-envelope-o"></i>
                                                <span>Surat Pemasangan Listrik</span></a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="<?= base_url('pejabat/'); ?>">
                                <i class="fa fa-users"></i>
                                <span>Pemerintahan Desa</span></a>
                        </li>
                        <li>
                                <a href="<?= base_url('logout'); ?>">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span></a>
                        </li>
                </ul>
            </section>
        </aside>