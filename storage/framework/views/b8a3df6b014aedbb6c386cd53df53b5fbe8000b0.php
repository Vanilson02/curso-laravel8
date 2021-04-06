

<?php $__env->startSection('title', 'Listagem dos Posts'); ?>
    
<?php $__env->startSection('content'); ?>
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

            
            <img src="<?php echo e(url("storage/{$post->image}")); ?>" alt="<?php echo e($post->title); ?>" style="max-width:100px;">

            [ <a href="<?php echo e(route('posts.show', $post->id )); ?>">Ver </a> ]
            [ <a href="<?php echo e(route('posts.edit', $post->id )); ?>">editar </a> ]

            <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <button type="submit">Deletar <?php echo e($post->title); ?></button>
            </form>

        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <hr>

    <?php if(isset($filters)): ?>
        <?php echo e($posts->appends($filters)->links()); ?>

    <?php else: ?>
        <?php echo e($posts->links()); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>