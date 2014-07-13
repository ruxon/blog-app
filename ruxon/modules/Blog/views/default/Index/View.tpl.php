<?php $item = $this->getModel()?>

<div class="blog-post">

    <?php if ($item->getCover()):?>
        <?php $coverObject = \Toolkit::i()->fileStorage->bucket('images')->getImage($item->getCover())?>
        <a class="post-cover-image">
            <img src="<?php echo $coverObject->getThumbUrl(200)?>" alt="" />
        </a>
    <?php endif;?>

    <h2 class="blog-post-title"><?php echo $item->getName()?></h2>
    <p class="blog-post-meta"><?php echo DateHelper::niceDateTime($item->getPostDate())?>

        <?php if (Toolkit::i()->auth->isAdmin()):?>
            <a href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/update', array('id' => $item->getId()))?>">Редактировать</a>
            <a class="red" href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/delete', array('id' => $item->getId()))?>">Удалить</a>
        <?php endif;?>
    </p>

    <?php echo $item->getContent()?>

    <?php if ($item->getFile()):?>
        <div>
            <?php $fileObject = \Toolkit::i()->fileStorage->bucket('files')->getFile($item->getFile())?>
            <a target="_blank" href="<?php echo $fileObject->getFileUrl()?>"><?php echo $item->getFile()?></a>
        </div>
    <?php endif;?>
</div><!-- /.blog-post -->

<div class="blog-comments">
    <h3><?php echo $this->t('Basic', 'Comments')?></h3>
    <?php $this->widget('Blog', 'CommentsList', [
        'ObjectId' => $this->getModel()->getId()
    ])?>

    <h3><?php echo $this->t('Basic', 'Add comment')?></h3>
    <?php $this->widget('Blog', 'CommentCreate', [
        'ObjectId' => $this->getModel()->getId()
    ])?>
</div>

<div>
    <a href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/index')?>"><?php echo $this->t('Basic', 'Back to list')?></a>
</div>