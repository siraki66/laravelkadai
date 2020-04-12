<?php session_start();?>

<?PHP

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>



<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>
<h1>
   <div class="container">
      <div class="row o-3column">
        <div class="col-md-4">
  更新画面
</h1>

<form method="post" action="<?php echo e(url('/posts', $phone->id)); ?>">
  <?php echo e(csrf_field()); ?>

  <?php echo e(method_field('patch')); ?>

  <p>
    <input type="text" name="title" placeholder="スマホ名" value="<?php echo e(old('title', $phone->title)); ?> ">
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>

  <p>
    <textarea name="body" placeholder="内容"><?php echo e(old('body', $phone->price)); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>


 
  <p>
    <input type="text" name="bench" placeholder="ベンチマーク" value="<?php echo e(old('bench', $phone->bench)); ?>">
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>


  <a href="<?php echo e(url('/')); ?>" class="back">Back</a>

  <p><input type="submit" value="更新"></p>
</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('test'); ?>

<?PHP
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy_laravel/myblog/resources/views/posts/edit.blade.php ENDPATH**/ ?>