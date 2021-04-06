

<?php $__env->startSection('title','Criar novo Post'); ?>
    

<?php $__env->startSection('content'); ?>
    <h1>Cadastrar novo Post</h1>


    <form action="<?php echo e(route('posts.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo $__env->make('admin.posts._partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/create.blade.php ENDPATH**/ ?>