<?php session_start();?>

<?PHP
 

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>
 


<?php $__env->startSection('title', 'New Post'); ?>

<?php $__env->startSection('content'); ?>
<h1>追加画面</h1>


<form method="POST" action="<?php echo e(url('/posts/create')); ?>"  >
    <?php echo e(csrf_field()); ?>

    <p> 
    <input type="text" name="title" placeholder="スマホ名" value="<?php echo e(old('title')); ?>" required="required" >
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>


  <p> 
    <textarea name="price" placeholder="中古未使用相場" required="required"><?php echo e(old('body')); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>

  <p> 
    <textarea name="bench" placeholder="ベンチマーク" required="required"><?php echo e(old('body')); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>


<a href="<?php echo e(url('/')); ?>" class="back">Back</a>

    <input type="submit">
  </form>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('test'); ?>

<?PHP 
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy_laravel/myblog/resources/views/posts/create.blade.php ENDPATH**/ ?>