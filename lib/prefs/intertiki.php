<?php
// (c) Copyright 2002-2017 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: intertiki.php 61756 2017-03-19 03:22:49Z lindonb $

//this script may only be included - so its better to die if called directly.
if (strpos($_SERVER['SCRIPT_NAME'], basename(__FILE__)) !== false) {
	header('location: index.php');
	exit;
}

function prefs_intertiki_list()
{
	return [
		'intertiki_errfile' => [
			'name' => tra('Errors log file'),
			'size' => 42,
			'type' => 'text',
			'filter' => 'text',
			'default' => '',
		],
		'intertiki_logfile' => [
			'name' => tra('Access log file'),
			'size' => 42,
			'type' => 'text',
			'filter' => 'text',
			'default' => '',
		],
	];
}