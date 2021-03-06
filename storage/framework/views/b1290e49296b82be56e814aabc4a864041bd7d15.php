<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('frontend/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo e(asset('frontend/css/simple-sidebar.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin Panel</div>
      <div class="list-group list-group-flush">
        <a href="<?php echo e(route('all.teacher')); ?>" class="list-group-item list-group-item-action bg-light">Teacher</a>
        <a href="<?php echo e(route('all.students')); ?>" class="list-group-item list-group-item-action bg-light">Student</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Librarian</a>
        <a href="<?php echo e(route('all.books')); ?>" class="list-group-item list-group-item-action bg-light">Book</a>
        <a href="<?php echo e(route('all.course')); ?>" class="list-group-item list-group-item-action bg-light">Course</a>
        <a href="<?php echo e(route('all.dept')); ?>" class="list-group-item list-group-item-action bg-light">Department</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

 <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo e(asset('frontend/vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
"></script>
<script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type','info')); ?>"
    switch(type){
      case 'info' :
      toastr.info("<?php echo e(Session::get('message')); ?>");
      break;
      case 'success':
      toastr.success("<?php echo e(Session::get('message')); ?>");
      break;
      case 'warning':
      toastr.warning("<?php echo e(Session::get('message')); ?>");
      break;
      case 'error':
      toastr.error("<?php echo e(Session::get('message')); ?>");
      break;
    }
    <?php endif; ?>
  </script>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\atp3project\resources\views/welcome.blade.php ENDPATH**/ ?>