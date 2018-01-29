<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: 20160604_remove_unwanted_files_tiki.php 62176 2017-04-10 06:01:52Z drsassafras $

if (strpos($_SERVER["SCRIPT_NAME"], basename(__FILE__)) !== false) {
	header("location: index.php");
	exit;
}

/**
 * @param $installer
 */
function upgrade_20160604_remove_unwanted_files_tiki($installer)
{

	$files = array(
		'vendo/player/mp3/template_default/compileTemplateDefault.bat',
		'vendor/player/mp3/template_default/compileTemplateDefault.sh',
		'vendor/player/mp3/template_default/TemplateDefault.as',
		'vendor/player/mp3/template_default/test.mp3',
		'vendor/player/flv/flv_stream.php',
		'vendor/player/flv/template_default/compileTemplateDefault.bat',
		'vendor/player/flv/template_default/compileTemplateDefault.sh',
		'vendor/player/flv/template_default/rorobong.jpg',
		'vendor/player/flv/template_default/TemplateDefault.as',
		'vendor/jcapture-applet/jcapture-applet/applet.php',
	);

	foreach ($files as $file) {
		if (is_writable($file)) {
			unlink($file);
		}
	}

}

