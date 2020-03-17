<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href=" <?php echo e(route('all.books')); ?>" class="btn btn-success">All books</a>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('store.book')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Title</label>
              <input type="text" class="form-control" placeholder="Book Title" name="book_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book ID </label>
              <input type="text" class="form-control" placeholder="Book id" name="book_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Book Image</label>
              <input type="file" class="form-control" placeholder="Enter Image" id="phone" name="book_image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Details</label>
              <textarea rows="5" class="form-control" placeholder="details" name="book_details"></textarea>
            </div>
          </div>
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
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/book/add_book.blade.php ENDPATH**/ ?>