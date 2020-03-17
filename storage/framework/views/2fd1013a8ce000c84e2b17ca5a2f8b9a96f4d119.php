<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="<?php echo e(route('add.book')); ?>" class="btn btn-danger">Add Books</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Books Name </th>
          <th>Books image</th>
          <th>Books details</th>
          <th>Action </th>
        </tr>
       <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $books): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo e($books->book_name); ?></td>
         <td> <img src="<?php echo e(URL::to($books->book_image)); ?>" style="height:70px; width:40px"></td>
         <td><?php echo e($books->book_details); ?></td>
         <td>
           <a href="<?php echo e(url('edit/books/'.$books->id)); ?>" class="btn btn-info">Edit</a>
           <a href="<?php echo e(url('delete/books/'.$books->id)); ?>" class="btn btn-danger">Delete</a>
         </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\atp3project\resources\views/book/all_books.blade.php ENDPATH**/ ?>