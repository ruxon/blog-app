<?php

namespace ruxon\modules\Blog\models\mappers;


class BlogPostMapper extends \ObjectMapper
{
    protected $sModuleAlias = 'Blog';

    public function tableName()
    {
        return 'blog_post';
    }

    public function fields()
    {
        return [
            'Id' => array(
                'Type'     => 'Integer',
                'Title'    => $this->t('Post', 'Id'),
                'Blocked'  => true,
                'Field'    => 'id'
            ),

            'PostDate' => array(
                'Type'     => 'DateTime',
                'Title'    => $this->t('Post', 'PostDate'),
                'Field'    => 'post_date'
            ),

            'Name' => array(
                'Type'    => 'String',
                'Title'   => $this->t('Post', 'Name'),
                'Field'   => 'name',
                'Validation' => array(
                    'Required'  => true,
                    'MaxLength' => 255,
                )
            ),

            'Content' => array(
                'Type'    => 'Text',
                'Title'   => $this->t('Post', 'Content'),
                'Field'   => 'content',
                'Validation' => array(
                    'Required'  => true,
                )
            ),

            'Cover' => array(
                'Type'    => 'String',
                'Title'   => $this->t('Post', 'Cover'),
                'Field'   => 'cover',
            ),

            'File' => array(
                'Type'    => 'String',
                'Title'   => $this->t('Post', 'File'),
                'Field'   => 'file',
            ),

            'IsActive' => array(
                'Type'     => 'Boolean',
                'Title'    => $this->t('Post', 'IsActive'),
                'Field'    => 'is_active'
            )
        ];
    }

    public function defaultScope()
    {
        return [
            'Order' => [
                'PostDate' => 'DESC'
            ]
        ];
    }

    public function scopes()
    {
        return [
            'active' => [
                'Criteria' => [
                    'IsActive' => true
                ]
            ]
        ];
    }

    public function relations()
    {
        return [
            'Comments' => [
                'Title' => $this->t('Post', 'Comments'),
                'Type'     => 'HasMany',
                'Field'    => 'post_id',
                'Alias'    => 'Comments',
                'ToMapperAlias'  => 'BlogCommentMapper',
            ]
        ];
    }

    public function beforeSave($object)
    {
        if ($object->isNew() && !$object->getPostDate()) {
            $object->setPostDate(date("Y-m-d H:i:s"));
        }

        return parent::beforeSave($object);
    }
} 