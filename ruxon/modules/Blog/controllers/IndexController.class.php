<?php

namespace ruxon\modules\Blog\controllers;

/**
 * Class IndexController
 * @package ruxon\modules\Blog\controllers
 */
class IndexController extends \FrontendController
{
    protected $sMapperAlias = '\ruxon\modules\Blog\models\mappers\BlogPostMapper';

    public function filters()
    {
        return array(
            'AdminAccess' => array('Create', 'Update', 'Delete'),
        );
    }

    /**
     * Список записей
     *
     * @param array $params
     * @return \ActionResponse|mixed
     */
    public function actionIndex($params = array())
    {
        $limit = 1;
        $offset = !empty($_GET['page']) ? ($_GET['page'] - 1) * $limit : 0;

        if (\Toolkit::i()->auth->isAdmin()) {
            $items = $this->mapper()->find(['Limit' => $limit, 'Offset' => $offset]);
            $count = $this->mapper()->count();
        } else {
            $items = $this->mapper()->active()->find(['Limit' => $limit, 'Offset' => $offset]);
            $count = $this->mapper()->active()->count();
        }

        $oPagination = new \Pagination($count);
        $oPagination->setPageSize($limit);

        return $this->view('Index', array(
            'Items' => $items,
            'Pagination' => $oPagination
        ));
    }

    /**
     * Создание записи
     *
     * @param array $params
     * @return \ActionResponse
     */
    public function actionCreate($params = array())
    {
        $errors = array();
        $model = $this->mapper()->create();

        if (!empty($_POST)) {
            $model->import($_POST);

            if (!empty($_FILES)) {
                $model->setCover(\Toolkit::i()->fileStorage->bucket('images')->saveUploadedFile($model, 'Cover'));
            }

            if ($model->save()) {
                $this->redirect(array('index'));
            } else {
                $errors = $model->getErrors();
            }
        }

        return $this->view('Create', array(
            'Model' => $model,
            'Errors' => $errors
        ));
    }

    /**
     * Редактирование записи
     *
     * @param array $params
     * @return \ActionResponse
     */
    public function actionUpdate($params = array())
    {
        $errors = array();
        $model = $this->mapper()->findById($params['id']);

        if (!empty($_POST)) {
            $attr = $_POST;
            unset($attr['Cover']);
            unset($attr['File']);

            $model->import($attr);

            if (!empty($_FILES['Cover']['name'])) {
                $model->setCover(\Toolkit::i()->fileStorage->bucket('images')->saveUploadedFile($model, 'Cover'));
            }

            if (!empty($_POST['Cover_delete'])) {

                \Toolkit::i()->fileStorage->bucket('images')->removeFile($model->getCover());

                $model->setCover('');
            }

            if (!empty($_FILES['File']['name'])) {
                $model->setFile(\Toolkit::i()->fileStorage->bucket('files')->saveUploadedFile($model, 'File'));
            }

            if (!empty($_POST['File_delete'])) {

                \Toolkit::i()->fileStorage->bucket('files')->removeFile($model->getFile());

                $model->setFile('');
            }

            if ($model->save()) {
                $this->redirect(array('index'));
            } else {
                $errors = $model->getErrors();
            }
        }

        return $this->view('Update', array(
            'Model' => $model,
            'Errors' => $errors
        ));
    }

    /**
     * Удаление записи
     *
     * @param array $params
     * @return \ActionResponse|void
     */
    public function actionDelete($params = array())
    {
        if ($this->mapper()->deleteById($params['id'])) {
            $this->redirect(array('index'));
        }
    }

    /**
     * Просмотр записи
     *
     * @param array $params
     * @return \ActionResponse
     */
    public function actionView($params = array())
    {
        $model = $this->mapper()->findById($params['id']);

        return $this->view('View', array(
            'Model' => $model,
        ));
    }
} 