<?php if ($this->getItems()->count()):?>
    <div class="comments">
        <?php foreach ($this->getItems() as $item):?>
            <div class="comment-item">
                <p class="blog-post-meta"><?php echo DateHelper::niceDateTime($item->getPostDate())?> by <a href="#"><?php echo $item->getAuthor()?></a></p>
                <p><?php echo $item->getContent()?></p>
            </div>
        <?php endforeach;?>
    </div>
<?php else:?>
    <p>Комментариев пока нет.</p>
<?php endif;?>