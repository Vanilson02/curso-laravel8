<?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>

<?php echo csrf_field(); ?>
<input type="text" name="title" id="title" value="<?php echo e($post->title ?? old('title')); ?>" placeholder="Titulo">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Texto"><?php echo e($post->content ?? old('content')); ?></textarea>
<button type="submit">Enviar</button><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/_partials/form.blade.php ENDPATH**/ ?>