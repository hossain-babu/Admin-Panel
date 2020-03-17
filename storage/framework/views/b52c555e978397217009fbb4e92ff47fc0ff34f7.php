<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="<?php echo e(route('student.add')); ?>" class="btn btn-danger">Add Students</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Student Name </th>
          <th>Student Id</th>
          <th>Student dept</th>
          <th>Student Image</th>
          <th>Action </th>
        </tr>
       <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo e($student->student_name); ?></td>
         <td><?php echo e($student->stu_id); ?></td>
         <td><?php echo e($student->dept_name); ?></td>
         <td> <img src="<?php echo e(URL::to($student->stu_image)); ?>" style="height:70px; width:40px"></td>
         <td>
           <a href="<?php echo e(url('edit/student/'.$student->id)); ?>" class="btn btn-info">Edit</a>
           <a href="<?php echo e(url('delete/student/'.$student->id)); ?>" class="btn btn-danger">Delete</a>
           <a href="<?php echo e(url('view/student/'.$student->id)); ?>" class="btn btn-danger">View</a>
         </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/student/all_student.blade.php ENDPATH**/ ?>