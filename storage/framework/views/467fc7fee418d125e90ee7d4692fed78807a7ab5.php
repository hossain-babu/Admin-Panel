<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="<?php echo e(route('add.teacher')); ?>" class="btn btn-danger">Add teachers</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Teacher Name </th>
          <th>Teacher Id</th>
          <th>Teacher dept</th>
          <th>Teacher Image</th>
          <th>Action </th>
        </tr>
       <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo e($teacher->teacher_name); ?></td>
         <td><?php echo e($teacher->teacher_id); ?></td>
         <td><?php echo e($teacher->dept_name); ?></td>
         <td> <img src="<?php echo e(URL::to($teacher->teacher_image)); ?>" style="height:70px; width:40px"></td>
         <td>
           <a href="<?php echo e(url('edit/teacher/'.$teacher->id)); ?>" class="btn btn-info">Edit</a>
           <a href="<?php echo e(url('delete/teacher/'.$teacher->id)); ?>" class="btn btn-danger">Delete</a>
           <a href="<?php echo e(url('view/teacher/'.$teacher->id)); ?>" class="btn btn-danger">View</a>
         </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/teacher/all_teacher.blade.php ENDPATH**/ ?>