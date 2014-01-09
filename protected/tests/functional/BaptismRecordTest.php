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

class BaptismRecordTest extends WebTestCase
{
	protected $captureScreenshotOnFailure = TRUE;
	protected $screenshotPath = '/home/hacker/public_html/screenshots';
	protected $screenshotUrl = 'http://localhost/~hacker/screenshots';

	public $fixtures = array(
		'families' => 'Families',
		'people' => 'People',
		'baptisms' => 'BaptismRecord',
	);

	public function testCreateNonParishioner()
	{
		$this->loginAs('pastor', 'pastor');
		$baps = array(
			array(
				'name' => 'Antony Jacob',
				'dob' => '05/12/2013',
				'baptism_dt' => '12/12/2013',
				'baptism_place' => 'Bangalore',
				'sex' => 1,
				'residence' => 'Bangalore',
				'mother_tongue' => 'Kannada',
				'fathers_name' => 'Lambert Jacob',
				'mothers_name' => 'Preethi Jacob',
			),
		);
		foreach($baps as $bap) {
			$this->open('baptismRecords/create');
			foreach($bap as $key => $value) {
				if (preg_match('/^sex$/', $key)) {
					$this->select("name=BaptismRecord[$key]", "value=$value");
				} else {
					$this->type("name=BaptismRecord[$key]", $value);
				}
			}
			$this->clickAndWait("//input[@value='Create']");
			foreach($bap as $key => $value) {
				if (preg_match('/^sex$/', $key)) {
					$this->assertTextPresent(FieldNames::value('sex', $value));
				} else {
					$this->assertTextPresent($value);
				}
			}
			$this->clickAndWait("link=Create Certificate");
			$this->clickAndWait("//input[@value='Create']");
			foreach($bap as $key => $value) {
				if (preg_match('/^sex$/', $key)) {
					$this->assertTextPresent(FieldNames::value('sex', $value));
				} else {
					$this->assertTextPresent($value);
				}
			}
			$this->assertTextPresent(date_format(new DateTime(), 'd/m/Y'));
			$this->assertElementPresent("link=Download Certificate");
		}
	}
}

?>