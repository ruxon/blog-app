<?php

return array(
    'blog_comment' => array(
        'Fields' => array(
            'id' => array(
                'Type' => 'pk',
            ),
            'post_date' => array(
                'Type' => 'datetime',
            ),
            'author' => array(
                'Type' => 'varchar(255)',
            ),
            'post_id' => array(
                'Type' => 'int(10)',
                'Default' => 0
            ),
            'content' => array(
                'Type' => 'text',
            )
        )
    )
);