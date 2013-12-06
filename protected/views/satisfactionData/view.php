<?php
#
# This file is part of St. Benno's Parish Software
#
# St. Benno's Parish Software - software to manage tomorrow's parish
# Copyright (C) 2013  Redemptorist Media Center
#
# St. Benno's Parish Software is free software: you can redistribute it
# and/or modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# St. Benno's Parish Software is distributed in the hope that it will
# be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
# of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
/* @var $this SatisfactionDataController */
/* @var $model SatisfactionData */

$this->breadcrumbs=array(
	'Satisfaction Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SatisfactionData', 'url'=>array('index')),
	array('label'=>'Create SatisfactionData', 'url'=>array('create')),
	array('label'=>'Update SatisfactionData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SatisfactionData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SatisfactionData', 'url'=>array('admin')),
);
?>

<h1>View SatisfactionData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'family_id',
		'id',
		'satisfaction_item_id',
		'satisfaction_value',
	),
)); ?>