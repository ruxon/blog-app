<?php

namespace ruxon\modules\Blog\models\mappers;


class BlogCommentMapper extends \ObjectMapper
{
    protected $sModuleAlias = 'Blog';

    public function tableName()
    {
        return 'blog_comment';
    }

    public function fields()
    {
        return array(
            'Id' => array(
                'Type'     => 'Integer',
                'Title'    => $this->t('Comment', 'Id'),
                'Blocked'  => true,
                'Field'    => 'id'
            ),

            'PostDate' => array(
                'Type'     => 'DateTime',
                'Title'    => $this->t('Comment', 'PostDate'),
                'Field'    => 'post_date'
            ),

            'Author' => array(
                'Type'    => 'String',
                'Title'   => $this->t('Comment', 'Author'),
                'Field'   => 'author',
                'Validation' => array(
                    'Required'  => true,
                )
            ),

            'Content' => array(
                'Type'    => 'Text',
                'Title'   => $this->t('Comment', 'Content'),
                'Field'   => 'content',
                'Validation' => array(
                    'Required'  => true,
                )
            ),

            'PostId' => array(
                'Type'     => 'Integer',
                'Title'    => $this->t('Comment', 'PostId'),
                'Field'    => 'post_id'
            )
        );
    }

    public function relations()
    {
        return array(
            'Post' => array(
                'Title' => $this->t('Comment', 'Post'),
                'Type'     => 'BelongsTo',
                'Field'    => 'post_id',
                'Alias'    => 'Post',
                'ToMapperAlias'  => 'BlogPostMapper',
            ),
        );
    }
} 