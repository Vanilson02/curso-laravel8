
<a href="<?php echo e(route('posts.create')); ?>">Criar novo Post</a>

<?php if(session('message')): ?>
    <div><?php echo e(session('message')); ?></div>
<?php endif; ?>

<hr>
<form action="<?php echo e(route('posts.search')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="search" id="search">
    <button type="submit">Buscar</button>
</form>
<h1>Posts</h1>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p>
        <?php echo e($post->title); ?>

        [ <a href="<?php echo e(route('posts.show', $post->id )); ?>">Ver </a> ]
    </p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<hr>

<?php if(isset($filters)): ?>
    <?php echo e($posts->appends($filters)->links()); ?>

<?php else: ?>
    <?php echo e($posts->links()); ?>

<?php endif; ?>
<?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>