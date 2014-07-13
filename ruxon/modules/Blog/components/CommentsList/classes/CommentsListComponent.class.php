<?php

namespace ruxon\modules\Blog\components\CommentsList\classes;

class CommentsListComponent extends \Component
{
    protected $sModuleAlias = 'Blog';
    protected $sComponentAlias = 'CommentsList';

    public function run()
    {
        $this->start();

        \Loader::import('Modules.Blog');

		$aResult = array();
        $objectId = $this->getComponentRequest()->getObjectId();

        $comments = $this->mapper('\ruxon\modules\Blog\models\mappers\BlogCommentMapper')->find([
            'Criteria' => [
                'PostId' => $objectId
            ],
            'Order' => [
                'PostDate' => 'Desc'
            ]
        ]);

        $aResult['Items'] = $comments;
        
        $this->end($aResult, true);
    }
}