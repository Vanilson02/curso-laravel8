<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
</head>
<body>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>