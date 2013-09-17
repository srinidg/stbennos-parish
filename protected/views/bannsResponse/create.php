<?php
/* @var $this BannsResponseController */
/* @var $model BannsResponse */

$this->breadcrumbs=array(
       'Certificates' => array('site/page', 'view' => 'certificates'),
	'Banns Responses'=>array('index'),
	'Create',
);

$this->menu=array(
 	array('label'=>'Create BannsRecord', 'url'=>array('/bannsRecords/create')),
	array('label'=>'List BannsResponse', 'url'=>array('index')),
	array('label'=>'Manage BannsResponse', 'url'=>array('admin')),
);
?>

<h1>Create BannsResponse</h1>

<?php echo $this->renderPartial('_form_full', array(
	'model'	=> $model,
	'data'	=> $banns,
	'now'	=> $now,
)); ?>
