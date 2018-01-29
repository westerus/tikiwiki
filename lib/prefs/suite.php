<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: suite.php 62023 2017-04-02 07:10:43Z lindonb $

function prefs_suite_list()
{
	return array(
		'suite_jitsi_provision' => array(
			'name' => tr('Expose Jitsi provision URL'),
			'description' => tr('Provide connection configuration information for Jitsi users to connect to a community/organization instant messaging server.'),
			'help' => 'Jitsi',
			'type' => 'flag',
			'default' => 'n',
		),
		'suite_jitsi_configuration' => array(
			'name' => tr('Jitsi configuration'),
			'description' => tr('Content of a Jitsi-format Java properties file.'),
			'type' => 'textarea',
			'size' => 10,
			'default' => '',
		),
	);
}