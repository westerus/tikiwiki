<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: pam.php 63655 2017-08-24 23:01:48Z drsassafras $

function prefs_pam_list()
{
	return array(
		'pam_create_user_tiki' => array(
			'name' => tra('Create user if not registered in Tiki'),
			'type' => 'flag',
			'description' =>tr('If a user was externally authenticated, but not found in the Tiki user database, Tiki will create an entry in its user database.'),
			'default' => 'n',
		),
		'pam_skip_admin' => array(
			'name' => tra('Use Tiki authentication for Admin login'),
			'type' => 'flag',
			'description' => tra('The user “admin” will be authenticated by <b>only</b> using Tiki’s user database. This option has no effect on users other than “admin”.'),
			'default' => 'n',
		),
		'pam_service' => array(
			'name' => tra('PAM service'),
			'description' => tra(''),
			'type' => 'text',
			'size' => 20,
			'hint' => tra('Currently unused'),
			'default' => '',
		),
	);
}
