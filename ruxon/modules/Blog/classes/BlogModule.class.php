<?php

namespace ruxon\modules\Blog\classes;

class BlogModule extends \BaseModule
{
    public static function onNewComment($event)
    {
        $event->sender->setPostDate(date("Y-m-d H:i:s"));

        return true;
    }
}