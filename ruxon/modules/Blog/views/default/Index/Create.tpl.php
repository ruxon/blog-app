<h1><?php echo $this->t('Basic', 'Create post');?></h1>

<?php $this->renderPartial('_Form', array(
    'Model' => $this->getModel(),
    'Errors' => $this->getErrors()
));?>