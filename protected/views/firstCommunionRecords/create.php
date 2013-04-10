<?php
/* @var $this FirstCommunionRecordsController */
/* @var $model FirstCommunionRecord */

$this->breadcrumbs=array(
	'First Communion Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FirstCommunionRecord', 'url'=>array('index')),
	array('label'=>'Manage FirstCommunionRecord', 'url'=>array('admin')),
);
?>

<h1>Create FirstCommunionRecord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>