<h1>Detalhes do Post - <?php echo e($post->title); ?></h1>
<ul>
    <li><strong> Titúlo: </strong> <?php echo e($post->title); ?></li>
    <li><strong> Conteúdo: </strong> <?php echo e($post->content); ?></li>
</ul>

<form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar Post: <?php echo e($post->title); ?></button>
</form><?php /**PATH /var/www/projetos/curso-laravel8/resources/views/admin/posts/show.blade.php ENDPATH**/ ?>