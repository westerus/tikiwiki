<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Plugin.php 57969 2016-03-17 20:07:40Z jonnybradley $

//this script may only be included - so its better to die if called directly.
if (strpos($_SERVER['SCRIPT_NAME'], basename(__FILE__)) !== false) {
	header('location: index.php');
	exit;
}

/**
 * Class Table_Settings_Plugin
 *
 * Used for tables generated by wiki plugins. Table_Plugin needs to be run first to create the settings
 */
class Table_Settings_Plugin extends Table_Settings_Abstract
{
	protected $ts = array(
		'selflinks' => false,
		'usecolselector' => false,
		'filters' => array(
			'external' => false,
		),
		'ajax' => array(
			'type' => false,
		),
	);
}
