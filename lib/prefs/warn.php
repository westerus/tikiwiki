<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: warn.php 63592 2017-08-18 05:00:30Z drsassafras $

function prefs_warn_list()
{
	return array(
		'warn_on_edit_time' => array(
			'name' => tra('Edit idle timeout'),
			'description' => tra('Select the amount of time (in minutes) after which a user’s edit session will expire. If the user does not save or preview their work, it will be lost. Tikiwiki will display a “countdown time” in the user’s browser and display an alert when only a minute remains.'),
			'units' => tra('minutes'),
			'type' => 'list',
			'options' => array(
				'1' => tra('1'),
				'2' => tra('2'),
				'5' => tra('5'),
				'10' => tra('10'),
				'15' => tra('15'),
				'30' => tra('30'),
			),
			'default' => 2,
		),
	);
}
