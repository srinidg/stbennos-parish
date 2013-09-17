<?php
/* @var $this FirstCommunionCertificateController */
/* @var $model FirstCommunionCertificate */

$this->breadcrumbs=array(
       'Certificates' => array('site/page', 'view' => 'certificates'),
	'First Communion Certificates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
 	array('label'=>'Create FirstCommunionRecord', 'url'=>array('/firstCommunionRecords/create')),
	array('label'=>'List FirstCommunionCertificate', 'url'=>array('index')),
	array('label'=>'View FirstCommunionCertificate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FirstCommunionCertificate', 'url'=>array('admin')),
);
?>

<h1>Update FirstCommunionCertificate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>