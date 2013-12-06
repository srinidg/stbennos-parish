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
/* @var $this MassBookingController */
/* @var $model MassBooking */

$this->breadcrumbs=array(
	'Mass Bookings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MassBooking', 'url'=>array('index')),
	array('label'=>'Create MassBooking', 'url'=>array('create')),
	array('label'=>'View MassBooking', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MassBooking', 'url'=>array('admin')),
);
?>

<h1>Update MassBooking <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'mass_id' => $model->mass_id, 'mass_dt' => $model->mass_dt)); ?>