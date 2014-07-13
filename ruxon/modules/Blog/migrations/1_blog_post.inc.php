<?php

return array(
    'blog_post' => array(
        'Fields' => array(
            'id' => array(
                'Type' => 'pk',
            ),

            'post_date' => array(
                'Type' => 'datetime',
            ),

            'name' => array(
                'Type' => 'varchar(255)',
            ),

            'content' => array(
                'Type' => 'text',
            ),

            'cover' => array(
                'Type' => 'varchar(255)',
            ),

            'file' => array(
                'Type' => 'varchar(255)',
            ),

            'is_active' => array(
                'Type' => 'tinyint(1) unsigned',
                'Default' => '0',
            )
        )
    )
);