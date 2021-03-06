<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: restrict.php 63683 2017-08-28 04:26:30Z drsassafras $

function prefs_restrict_list()
{
	return array(
		'restrict_language' => array(
			'name' => tra('Restrict supported languages'),
			'description' => tra('Limit the languages made available on the site.'),
			'type' => 'flag',
			'shorthint' => tr('Use Ctrl+Click to select multiple languages.'),
			'default' => 'n',
			'tags' => array('basic'),
		),
	);
}

