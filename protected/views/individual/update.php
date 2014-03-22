<?php
#
# This file is part of Alive Parish Software
#
# Alive Parish - software to manage tomorrow's parish
# Copyright (C) 2013  Redemptorist Media Center
#
# Alive Parish Software is free software: you can redistribute it
# and/or modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# Alive Parish Software is distributed in the hope that it will
# be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
# of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
/* @var $this IndividualController */
/* @var $model Individuals */

$this->breadcrumbs=array(
	'Individuals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Individuals', 'url'=>array('index')),
	array('label'=>'Create Individual', 'url'=>array('create')),
	array('label'=>'View Individual', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Individuals', 'url'=>array('admin')),
);
?>

<h1>Update Individual <?php echo $model->id; ?></h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'families-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model);
	$member = $model->member;
	if (!isset($member)) {
		$member = new People();
	}
	$tabs = array(
        'tab1'=>array(
            'title'=>'Unit Data',
            'view'=>'_form_fields',
            'data'=>array(
				'form'=>$form,
                'model'=>$model,
				'unit'=>$model->unit,
            ),
        ),
        'tab2'=>array(
            'title'=>'Member',
            'view'=>'../person/_person_form',
            'data'=>array(
				'form'=>$form,
				'person'=>'member',
                'model'=>$member,
				'ac'=>$ppl_ac
            ),
        ),
	);
?>
<?php $this->widget('CTabView',array(
    'tabs'=>$tabs
)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
