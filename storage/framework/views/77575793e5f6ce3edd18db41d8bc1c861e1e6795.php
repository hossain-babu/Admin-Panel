<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <a href="<?php echo e(route('student.add')); ?>" class="btn btn-danger">Add Students</a>
    <a href="<?php echo e(route('all.students')); ?>" class="btn btn-danger">All Students</a>
      <div>
        <p>Student Name: <?php echo e($student->student_name); ?> </p>
        <p>Student id: <?php echo e($student->stu_id); ?> </p>
        <p>Student Password: <?php echo e($student->stu_pass); ?> </p>
        <p>Student Department: <?php echo e($student->dept_name); ?> </p>
        <p>Student Phone: <?php echo e($student->stu_phn); ?> </p>
        <img src="<?php echo e(url($student->stu_image)); ?>" style="height: 200px; width:auto">
        <p>Father name: <?php echo e($student->father_name); ?> </p>
        <p>Mother Name: <?php echo e($student->mother_name); ?> </p>
        <p>Present Address: <?php echo e($student->student_address); ?> </p>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/student/view_student.blade.php ENDPATH**/ ?>