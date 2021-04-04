<h1>Cadastrar novo Post</h1>
<form action="<?php echo e(route('posts.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="title" id="title" placeholder="Titulo">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Texto"></textarea>
    <button type="submit">Enviar</button>
</form><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/create.blade.php ENDPATH**/ ?>