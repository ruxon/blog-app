<?php

namespace ruxon\modules\Blog\components\CommentCreate\classes;

class CommentCreateComponent extends \Component
{
    protected $sModuleAlias = 'Blog';
    protected $sComponentAlias = 'CommentCreate';

    public function run()
    {
        $this->start();

        \Loader::import('Modules.Blog');

		$aResult = array();
        $objectId = $this->getComponentRequest()->getObjectId();

        $aResult['Model'] = new \ruxon\modules\Blog\models\BlogComment;

        if (!empty($_POST)) {
            // добавление комментария

            $object = new \ruxon\modules\Blog\models\BlogComment;
            $object->import($_POST);
            $object->setPostId($objectId);

            $object->on($object::EVENT_NEW_COMMENT, array('\ruxon\modules\Blog\classes\\'.$this->sModuleAlias.'Module', 'onNewComment'));

            if (!$object->save()) {
                $aResult['Errors'] = $object->getErrors();
                $aResult['Model'] = $object;
            } else {
                $aResult['Success'] = true;

                $this->redirect(array('index', 'view'), array('id' => $objectId));
            }
        } else {
            $aResult['Success'] = false;
        }
        
        $this->end($aResult, true);
    }
}