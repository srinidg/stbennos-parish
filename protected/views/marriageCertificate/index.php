<?php
/* @var $this MarriageCertificateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marriage Certificates',
);

$this->menu=array(
	array('label'=>'Create MarriageCertificate', 'url'=>array('create')),
	array('label'=>'Manage MarriageCertificate', 'url'=>array('admin')),
);
?>

<h1>Marriage Certificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>