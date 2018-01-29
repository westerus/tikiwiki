<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: menus.php 61815 2017-03-22 14:50:08Z jyhem $

function prefs_menus_list()
{
	return array(
		'menus_items_icons' => array(
			'name' => tra('Menu icons'),
			'description' => tra('Allows icons to be defined for menu entries'),
			'type' => 'flag',
			'default' => 'n',
		),
		'menus_items_icons_path' => array(
			'name' => tra('Default path for the icons'),
			'description' => tra(''),
			'type' => 'text',
			'default' => 'img/icons/large',
		),
		'menus_edit_icon' => array(
			'name' => tra('Edit menu icon'),
			'description' => tra('Adds an icon on the navbar to edit menu entries'),
			'type' => 'flag',
			'default' => 'n',
		),
	);
}
