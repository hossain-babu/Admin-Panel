<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="<?php echo e(route('add.course')); ?>" class="btn btn-danger">Add Course</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Course Name </th>
          <th>Course ID</th>
          <th>Action </th>
        </tr>
        <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo e($course->course_name); ?></td>
         <td><?php echo e($course->course_id); ?></td>
         <td>
           <a href="<?php echo e(url('edit/course/'.$course->id)); ?>" class="btn btn-info">Edit</a>
           <a href="<?php echo e(url('delete/course/'.$course->id)); ?>" class="btn btn-danger">Delete</a>
         </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/course/all_course.blade.php ENDPATH**/ ?>