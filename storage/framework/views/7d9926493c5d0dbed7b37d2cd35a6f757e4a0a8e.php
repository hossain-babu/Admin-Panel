<?php $__env->startSection('content'); ?>
<div class="container">
      <a href="" class="btn btn-info">All Dept</a>
      <h1>Add Department</h1>
      <br>
      <hr>
<form action="<?php echo e(route('add.dept')); ?>" method="POST">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Department Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Department Name" name="deptname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Department ID</label>
    <input type="text" class="form-control"placeholder="department ID" name="dept_id">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/Allpages/dept.blade.php ENDPATH**/ ?>