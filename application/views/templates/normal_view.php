<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'partials/_header.php'; ?>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>
</head>
<body class="hold-transition sidebar-mini">

<?php //dump(($sidebar)); ?>

<div class="wrapper">
    <?php if($navbar): ?>
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
            </ul>
            
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    <?php endif; ?>

    <!-- Main content -->
    <section class="content">
        {{CONTENT}}
    </section>
    <!-- /.content -->

    <!-- Sidebar -->
    <?php if($sidebar): ?>
        <?php $this->load->view('templates/partials/_sidebar'); ?>
    <?php endif; ?>
    <!-- / .Sidebar -->

    <?php if($footer): ?>
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Bantuan Hukum
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    <?php endif; ?>

</div><!-- ./wrapper -->

<?php require_once 'partials/_footer.php'; ?>
<?php require_once 'partials/_datatable.php'; ?>

</body>
</html>
