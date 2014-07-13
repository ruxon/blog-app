<?php $model = $this->getModel()?>
<?php $this->widget('Ruxon', 'Form', [
    'Fields' => [
        "Name" => [
            "Title" => $model->mapper()->fieldTitle('Name'),
            "Field" => "Name",
            "Type" => "String",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "PostDate" => [
            "Title" => $model->mapper()->fieldTitle('PostDate'),
            "Field" => "PostDate",
            "Type" => "DateTime",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "Content" => [
            "Title" => $model->mapper()->fieldTitle('Content'),
            "Field" => "Content",
            "Type" => "Text",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "Cover" => [
            "Title" => $model->mapper()->fieldTitle('Cover'),
            "Field" => "Cover",
            "Type" => "Image",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "File" => [
            "Title" => $model->mapper()->fieldTitle('File'),
            "Field" => "File",
            "Type" => "File",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],

        "IsActive" => [
            "Title" => $model->mapper()->fieldTitle('IsActive'),
            "Field" => "IsActive",
            "Type" => "Checkbox",
            "Params" => [
                "HtmlOptions" => [
                    "class" => "form-control"
                ]
            ]
        ],
    ],

    "Buttons" => [
        [
            "Type" => "Submit",
            "Title" => $this->getModel()->getId() ? $this->t('Basic', 'Save') : $this->t('Basic', 'Create'),
            "HtmlOptions" => [
                "class" => "btn btn-primary"
            ]

        ]
    ],

    "Data" => $this->getModel(),
    "Errors" => $this->getErrors()
]);