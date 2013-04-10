<?php
/* @var $this MarriageCertificateController */
/* @var $model MarriageCertificate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cert_dt'); ?>
		<?php echo $form->textField($model,'cert_dt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marriage_id'); ?>
		<?php echo $form->textField($model,'marriage_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->