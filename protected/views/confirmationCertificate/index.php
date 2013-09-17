<?php
/* @var $this ConfirmationCertificatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
       'Certificates' => array('site/page', 'view' => 'certificates'),
	'Confirmation Certificates',
);

$this->menu=array(
 	array('label'=>'Create ConfirmationRecord', 'url'=>array('/confirmationRecords/create')),
	array('label'=>'Manage ConfirmationCertificate', 'url'=>array('admin')),
);
?>

<h1>Confirmation Certificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
