

<?php $__env->startSection('title', "Detalhes do {$post->title}"); ?>

<?php $__env->startSection('content'); ?>

    <h1>Detalhes do Post - <?php echo e($post->title); ?></h1>
    <ul>
        <li><strong> Titúlo: </strong> <?php echo e($post->title); ?></li>
        <li><strong> Conteúdo: </strong> <?php echo e($post->content); ?></li>
    </ul>

    <a href="<?php echo e(route('posts.index')); ?>">Voltar</a>

    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/show.blade.php ENDPATH**/ ?>