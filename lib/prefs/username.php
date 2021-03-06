<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: username.php 63665 2017-08-25 04:16:20Z drsassafras $

function prefs_username_list()
{
	return array(
		'username_pattern' => array(
			'name' => tra('Username pattern'),
			'description' => tr('This regex pattern force and forbid the use fo certain characters for username. For example to add Hebrew use: /&#94;&#91; \'\-_a-zA-Z0-9@\.א-ת]*$/ or for Chinese use: /&#94;&#91; \'\-_a-zA-Z0-9@\.\x00-\xff]*$/'),
			'type' => 'text',
			'size' => 25,
			'perspective' => false,
			'default' => '/^[ \'\-_a-zA-Z0-9@\.]*$/',
		),
	);	
}
