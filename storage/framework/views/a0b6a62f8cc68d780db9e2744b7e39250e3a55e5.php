<?php session_start();?>

<?PHP

if (isset($_SESSION['customer'])) {
    require'../require/after-header.php';

} else {
    require'../require/before-header.php';

}?>



<?php $__env->startSection('title', 'Blog Posts'); ?>


<?php $__env->startSection('content'); ?>
<h1><div class="row"></div>出力結果</h1>

<p>

<?php $__empty_1 = true; $__currentLoopData = $recordwords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recordword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <li>
    <a ><?php echo e($recordword->title); ?></a>
    <a href="<?php echo e(action('PostsController@edit', $recordword)); ?>" class="edit">[Edit]</a>
    <a href="#" class="del" data-id="<?php echo e($recordword->id); ?>">[x]</a>
      <form method="post" action="<?php echo e(url('/posts', $recordword->id)); ?>" id="form_<?php echo e($recordword->id); ?>">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('delete')); ?>

    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
  
</p>

<div class="search-text"> 
   <div class="container">
        <div class="row text-center">
            <div class="form">
                <form action="/search2" method="post" id="search-form" class="form-search form-horizontal">
                <?php echo csrf_field(); ?>
                    <input type="text" name="word" class="input-search" placeholder="スマホ名を入力">
                    <button type="submit" class="btn-search">検索</button>
                </form>
            </div>
        </div>         
   </div>     
</div>



</br>
</br>
</br>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('test'); ?>


<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">スマホ名</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">中古未使用相場</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">ベンチマーク</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">編集</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">削除</th>
    </tr>
</thead>

<tbody>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
      
      <td><a ><?php echo e($post->title); ?></a></td>
      <td><a ><?php echo e($post->price); ?></a></td>
      <td><a ><?php echo e($post->bench); ?></a></td>
      <td><a href="<?php echo e(action('PostsController@edit', $post)); ?>" class="edit">[Edit]</a></td>
      <td> <a href="#" class="del" data-id="<?php echo e($post->id); ?>">[x]</a>
      <form method="post" action="<?php echo e(url('/posts', $post->id)); ?>" id="form_<?php echo e($post->id); ?>">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('delete')); ?>

    </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
</tbody>
</table>


</div>




<?PHP
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>






                            

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy_laravel/myblog/resources/views/posts/search2.blade.php ENDPATH**/ ?>