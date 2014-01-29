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
/* @var $this ReportsController */

?>

<h1>Account Statement</h1>

<?php if (isset($data)): ?>

<div class="summary">
<span class="label">Statement from:</span>
<span class="value"><?php echo $from_dt . ' to ' . $to_dt ?></span>
<br />
<span class="label">Balance on <?php echo $from_dt ?>:</span>
<span class="value">&#8377;<?php echo number_format($obal) ?></span>
</div>

<table class="accounts">
<thead>
	<tr>
		<th>Date</th>
		<th>Account Category</th>
		<th>Description</th>
		<th class="rt">Credit (&#8377;)</th>
		<th class="rt">Debit (&#8377;)</th>
		<th class="rt">Balance (&#8377;)</th>
	</tr>
</thead>
<tbody>
<?php $bal = $obal;
foreach($data as $trans): ?>
	<tr>
		<td><?php echo $trans->created ?></td>
		<td><?php echo $trans->account->name ?></td>
		<td><?php echo $trans->descr ?></td>
		<td class="rt"><?php if ('credit' === $trans->type) {
			echo number_format($trans->amount);
			$bal += $trans->amount;
		} ?></td>
		<td class="rt"><?php if ('debit' === $trans->type) {
			echo number_format($trans->amount);
			$bal -= $trans->amount;
		} ?></td>
		<td class="rt"><?php echo number_format($bal) ?></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-statement-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
	<span class="leftHalf">
		<?php
		echo CHtml::label('From', 'from_dt');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'from_dt',
			'options'	=> array(
				'dateFormat' => Yii::app()->params['dateFmtDP'],
				'changeYear' => true
			),
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
			),
		));
		?>
	</span>
	<span class="rightHalf">
		<?php
		echo CHtml::label('To', 'to_dt');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'to_dt',
			'options'	=> array(
				'dateFormat' => Yii::app()->params['dateFmtDP'],
				'changeYear' => true
			),
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
			),
		));
		?>
	</span>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Generate'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
<?php endif ?>

