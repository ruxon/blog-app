<?php if (count($this->getItems())):?>

    <?php foreach ($this->getItems() as $item):?>
        <div class="blog-post">

            <?php if ($item->getCover()):?>
                <?php $coverObject = \Toolkit::i()->fileStorage->bucket('images')->getImage($item->getCover())?>
                <a href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/view', array('id' => $item->getId()))?>" class="post-cover-image">
                    <img src="<?php echo $coverObject->getThumbUrl(200)?>" alt="" />
                </a>
            <?php endif;?>

            <h2 class="blog-post-title"><a href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/view', array('id' => $item->getId()))?>"><?php echo $item->getName()?></a></h2>
            <p class="blog-post-meta"><?php echo DateHelper::niceDateTime($item->getPostDate())?>

                <?php if (Toolkit::i()->auth->isAdmin()):?>
                    <a href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/update', array('id' => $item->getId()))?>"><?php echo $this->t('Basic', 'Edit')?></a>
                    <a class="red" href="<?php echo Toolkit::i()->urlManager->createUrl('blog/index/delete', array('id' => $item->getId()))?>"><?php echo $this->t('Basic', 'Delete')?></a>
                <?php endif;?>
            </p>

            <?php echo $item->getContent()?>
        </div><!-- /.blog-post -->
    <?php endforeach;?>


    <br class="clear" />

    <?php echo $this->widget('Ruxon', 'Pager', array(
        'Pages' => $this->getPagination(),
    ));?>

<?php endif;?>