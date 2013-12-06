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
/* @var $this BaptismRecordsController */
/* @var $model BaptismRecord */

$this->breadcrumbs=array(
	'Registers' => array('site/page', 'view' => 'registers'),
	'Baptism Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BaptismRecord', 'url'=>array('index')),
	array('label'=>'Manage BaptismRecord', 'url'=>array('admin')),
);
?>

<h1>Create Baptism Record</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>