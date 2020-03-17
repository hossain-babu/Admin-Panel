<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="<?php echo e(route('all.dept')); ?>" class="btn btn-danger">All Department</a>
      <hr>
      <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
      <form action=" <?php echo e(url('update/department/'.$department->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label> department Name</label>
            <input type="text" class="form-control" value="<?php echo e($department->dept_name); ?>" placeholder="Name" name="dept_name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>department ID</label>
            <input type="text" class="form-control" value="<?php echo e($department->dept_id); ?>" placeholder="Department Id" name="dept_id" >
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/department/edit_department.blade.php ENDPATH**/ ?>