<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $name_page; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- UIkit JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.uikit.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</head>

<body>
    <div class="uk-container uk-height-1-1 uk-container-expand uk-margin-remove uk-padding-remove" id="dashboard">
        <div class="uk-width-1-1 uk-height-1-1 uk-padding-remove uk-margin-remove" id="body" uk-grid>
            <div class="uk-width-1-6@l uk-width-1-5@m uk-padding-remove uk-margin-remove" id="sidenav">
                <ul class="uk-nav uk-nav-default">
                    <?php
                    $level = $this->session->userdata('dawet_level');
                    ?>
                    <li
                        class="uk-nav-header uk-text-center uk-padding uk-padding-remove-horizontal uk-margin-small-bottom">
                        <img class="uk-width-3-5" src="<?php echo base_url(); ?>assets/img/color logo.png">
                    </li>
                    <li class="<?php if($page == 'dashboard') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>dashboard"><span class="iconify" data-icon="bx:bxs-dashboard"
                                data-inline="false"></span> Dashboard</a>
                    </li>
                    <?php 
                    if($level == 2)
                    {
                    ?>
                    <li class="<?php if($page == 'user') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>user"><span class="iconify" data-icon="bx:bxs-user" data-inline="false"></span>
                            User</a></li>
                    <?php
                    }
                    ?>
                    <li class="<?php if($page == 'pelanggan') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>pelanggan"><span class="iconify" data-icon="gridicons:multiple-users"
                                data-inline="false"></span>
                            Pelanggan</a></li>
                            
                    <?php 
                    if($level == 2)
                    {
                    ?>
                    <li class="<?php if($page == 'produk') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block" href="<?php echo base_url(); ?>produk"><span
                                class="iconify" data-icon="gridicons:product" data-inline="false"></span> Produk</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="<?php if($page == 'pesanan') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block" href="<?php echo base_url(); ?>pesanan"><span
                                class="iconify" data-icon="clarity:list-solid-badged" data-inline="false"></span>
                            Pesanan</a></li>
                    <?php 
                    if($level == 2)
                    {
                    ?>
                    <li class="<?php if($page == 'laporan_pesanan') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>laporan_pesanan"><span class="iconify" data-icon="carbon:report"
                                data-inline="false"></span> Laporan Pesanan</a></li>
                    <li class="<?php if($page == 'laporan_keuangan') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>laporan_keuangan"><span class="iconify" data-icon="carbon:report-data"
                                data-inline="false"></span> Laporan Keuangan</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="uk-width-5-6@l uk-width-4-5@m uk-padding-remove uk-margin-remove" id="content">
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove content-head">
                    <div
                        class="uk-width-1-1 uk-padding-small uk-padding-remove-bottom uk-margin-remove head uk-clearfix">
                        <div class="uk-inline poppins-semi-bold uk-float-left">
                            <?php echo $name_page; ?>
                        </div>
                        <div class="uk-inline poppins-medium uk-float-right">
                            <a type="button">
                                <span
                                    class="uk-margin-small-right uk-float-left uk-padding-small uk-padding-remove-horizontal">
                                    <?php echo $this->session->userdata('dawet_nama'); ?>
                                </span>
                                <div class="uk-float-right uk-border-circle profil uk-background-cover uk-background-top-center uk-background-norepeat"
                                    style="background-image: url('<?php echo base_url(); ?>assets/img/m header.png');"></div>
                            </a>
                            <div class="uk-padding-small" uk-dropdown="mode: click; pos: bottom-right; offset: 40">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>