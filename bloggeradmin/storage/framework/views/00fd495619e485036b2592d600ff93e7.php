<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('admin-asset/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('admin-asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  
  <!-- JQVMap -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin-asset/dist/css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  
  <!-- Daterange picker -->
  
  <!-- summernote -->
  
  
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
</head>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 <?php echo $__env->yieldContent('header'); ?>
  <!-- Preloader -->
  

  <!-- Navbar -->

  <!-- /.navbar -->

  <?php echo $__env->make('admin.partials.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->yieldContent('content-header'); ?>


     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <?php echo $__env->yieldContent('body'); ?>
          <!-- Main row -->
          <div class="row">

          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 Justus</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('admin-asset/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('admin-asset/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->

<!-- Sparkline -->

<!-- JQVMap -->


<!-- jQuery Knob Chart -->

<!-- daterangepicker -->


<!-- Tempusdominus Bootstrap 4 -->

<!-- Summernote -->

<!-- overlayScrollbars -->

<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin-asset/dist/js/adminlte.js')); ?>"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


</body>
</html>
<?php /**PATH C:\xampp\htdocs\blogger\resources\views/admin/main-layout.blade.php ENDPATH**/ ?>