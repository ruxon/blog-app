<?php $this->widget('Ruxon', 'Form', [
    'Fields' => [
        "Author" => [
            "Title" => $this->getModel()->mapper()->fieldTitle('Author'),
            "Field" => "Author",
            "Type" => "String",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "Content" => [
            "Title" => $this->getModel()->mapper()->fieldTitle('Content'),
            "Field" => "Content",
            "Type" => "Text",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ]
    ],

    "Buttons" => [
        [
            "Type" => "Submit",
            "Title" => $this->t('Basic', 'Save'),
            "HtmlOptions" => [
                "class" => "btn btn-primary"
            ]

        ]
    ],

    "Data" => $this->getModel(),
    "Errors" => $this->getErrors()
]);