<?php

namespace ruxon\modules\Blog\models;


class BlogComment extends \Object
{
    const EVENT_NEW_COMMENT = 'newComment';

    protected $sModuleAlias = 'Blog';

    public function onBeforeSave()
    {
        $this->trigger(self::EVENT_NEW_COMMENT, new \Event());

        return parent::onBeforeSave();
    }
} 