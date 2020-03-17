<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="<?php echo e(route('all.teacher')); ?>" class="btn btn-success">All teacher</a>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('insert.teacher')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Name</label>
              <input type="text" class="form-control" placeholder="Teacher Name" name="teacher_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label> Teacher id </label>
              <input type="text" class="form-control" placeholder="teacher ID" name="teacher_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>teacher Image</label>
              <input type="file" class="form-control" placeholder="Enter Image" id="phone" name="teacher_image">
            </div>
          </div>
          <br>
 
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Dept</label>
              <Select class="form-control" name="teacher_dept">
              <option>Choose</option>  
             <?php $__currentLoopData = $dept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dept->dept_id); ?>"><?php echo e($dept->dept_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </Select>

            </div>
          </div>
          <br>


          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/teacher/add_teacher.blade.php ENDPATH**/ ?>