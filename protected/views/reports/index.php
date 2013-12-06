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
/* @var $this ReportsController */

$this->breadcrumbs=array(
	'Reports',
);
?>
<div>
<span class="leftHalf">
<h1>People Reports</h1>

<?php
echo '<p>';
#echo CHtml::link('Families', array('families/report'));
#echo '</p><p>';
echo CHtml::link('Birthdays', array('reports/birthdays'));
echo '</p><p>';
echo CHtml::link('Anniversaries', array('reports/anniversaries'));
echo '</p><p>';
echo CHtml::link('Mass Bookings', array('reports/massBookings'));
echo '</p>';
?>
</span>
<span class="rightHalf">
<?php $this->renderPartial('../surveyReports/index'); ?>
</span>
</div>