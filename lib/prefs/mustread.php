<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: mustread.php 62023 2017-04-02 07:10:43Z lindonb $

function prefs_mustread_list()
{
	return array(
		'mustread_enabled' => array(
			'name' => tr('Must read'),
			'description' => tr('Allow assignment of mandatory readings and track progress.'),
			'help' => 'Must+Reads',
			'type' => 'flag',
			'default' => 'n',
			'dependencies' => ['feature_search', 'feature_trackers'],
		),
		'mustread_tracker' => array(
			'name' => tr('Must read tracker'),
			'description' => tr('Tracker containing the individual read requests.'),
			'hint' => tr('Tracker ID'),
			'type' => 'text',
			'filter' => 'int',
			'size' => 6,
			'profile_reference' => 'tracker',
			'default' => '',
		),
	);
}