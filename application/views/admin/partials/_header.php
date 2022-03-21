<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bantuan Hukum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/css/customlte.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php if(!isset($navbar)): ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('dashboard') ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link">Logout</a>
            </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        
       
    </nav>
    <!-- /.navbar -->
<?php endif; ?>

<!-- Sideabr -->
<?php if(!isset($sidebar)): ?>
    <?php $this->load->view('admin/partials/_sidebar'); ?>
<?php endif; ?>
<!-- / .Sideabr -->