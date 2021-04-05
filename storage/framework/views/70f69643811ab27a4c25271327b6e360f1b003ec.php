

<?php $__env->startSection('title', "Editar o {$post->title}"); ?>

<?php $__env->startSection('content'); ?>
    <h1>Editar o Post <strong><?php echo e($post->title); ?></strong></h1>

    <form action="<?php echo e(route('posts.update', $post->id)); ?>" method="post">
        <?php echo method_field('put'); ?>
        <?php echo $__env->make('admin.posts._partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/edit.blade.php ENDPATH**/ ?>