<?php
/* @var $this MarriageRecordsController */
/* @var $model MarriageRecord */
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
		<?php echo $form->label($model,'marriage_dt'); ?>
		<?php echo $form->textField($model,'marriage_dt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_name'); ?>
		<?php echo $form->textField($model,'groom_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_dob'); ?>
		<?php echo $form->textField($model,'groom_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_status'); ?>
		<?php echo $form->textField($model,'groom_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_rank_prof'); ?>
		<?php echo $form->textField($model,'groom_rank_prof',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_fathers_name'); ?>
		<?php echo $form->textField($model,'groom_fathers_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_mothers_name'); ?>
		<?php echo $form->textField($model,'groom_mothers_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groom_residence'); ?>
		<?php echo $form->textField($model,'groom_residence',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_name'); ?>
		<?php echo $form->textField($model,'bride_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_dob'); ?>
		<?php echo $form->textField($model,'bride_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_status'); ?>
		<?php echo $form->textField($model,'bride_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_rank_prof'); ?>
		<?php echo $form->textField($model,'bride_rank_prof',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_fathers_name'); ?>
		<?php echo $form->textField($model,'bride_fathers_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_mothers_name'); ?>
		<?php echo $form->textField($model,'bride_mothers_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_residence'); ?>
		<?php echo $form->textField($model,'bride_residence',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banns_licence'); ?>
		<?php echo $form->textField($model,'banns_licence'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minister'); ?>
		<?php echo $form->textField($model,'minister',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'witness1'); ?>
		<?php echo $form->textField($model,'witness1',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'witness2'); ?>
		<?php echo $form->textField($model,'witness2',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->