<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: permission.php 63639 2017-08-24 04:32:24Z drsassafras $

function prefs_permission_list()
{
	return array(
		'permission_denied_url' => array(
			'name' => tra('Send to URL'),
			'description' => tra('URL to redirect to on "permission denied"'),
			'type' => 'text',
			'size' => '50',
			'default' => '',
			'tags' => array('basic'),
		),
		'permission_denied_login_box' => array(
			'name' => tra('On permission denied, display login module'),
			'description' => tra('If an Anonymous visitor attempts to access a page to which he does have permission, Tiki will automatically display the Login module. 
Alternatively, use the Send to URL field to display a specific page (relative to your Tiki installation) instead.'),
			'type' => 'flag',
			'default' => 'n',
			'tags' => array('basic'),
		),
	);
}