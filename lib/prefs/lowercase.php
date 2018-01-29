<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: lowercase.php 63639 2017-08-24 04:32:24Z drsassafras $

function prefs_lowercase_list()
{
	return array(
		'lowercase_username' => array(
			'name' => tra('Force lowercase'),
			'description' => tra('Tiki will automatically convert all alphabetic characters in the username to all lowercase letters. For example <b>JohnDoe</b> becomes <b>johndoe</b>.'),
			'type' => 'flag',
			'help' => 'Login+Config#Case_Sensitivity',
			'default' => 'n',
		),
	);	
}
