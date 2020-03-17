<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <a href="<?php echo e(route('add.teacher')); ?>" class="btn btn-danger">Add teacher</a>
    <a href="<?php echo e(route('all.teacher')); ?>" class="btn btn-danger">All teacher</a>
      <div>
        <img src="<?php echo e(url($teacher->teacher_image)); ?>" style="height: 200px; width:auto">
        <p>teacher Name:<?php echo e($teacher->teacher_name); ?>   </p>
        <p>teacher id: <?php echo e($teacher->teacher_id); ?>   </p>
        <p>teacher Department:<?php echo e($teacher->dept_name); ?>  </p>
        

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/teacher/view_teacher.blade.php ENDPATH**/ ?>