<?php
// (c) Copyright 2002-2017 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: wikiplugin_metatag.php 61368 2017-02-23 16:19:35Z luciash $

function wikiplugin_metatag_info()
{
	return array(
		'name' => tr('MetaTag'),
		'documentation' => 'PluginMetaTag',
		'description' => tr('Add custom meta tags to HTML head on page where the plugin is used'),
		'prefs' => array( 'wikiplugin_metatag' ),
		'body' => tr('Meta tags attributes for the HTML head where each meta goes on one line and name of the meta tag and the content is separated by a pipe (%0) character. Or just copy paste the raw HTML tags here.', '<code>|</code>'),
		'validate' => 'all',
		'filter' => 'rawhtml_unsafe',
		'iconname' => 'code',
		'introduced' => 17,
		'tags' => array( 'basic' ),
		'params' => array(
			'name' => array(
				'required' => false,
				'name' => tr('Name'),
				'description' => tr('Name attribute of the meta tag'),
				'since' => '17.0',
				'filter' => 'text',
				'default' => '',
			),
			'content' => array(
				'required' => false,
				'name' => tr('Content'),
				'description' => tr('Content attribute of the meta tag'),
				'since' => '17.0',
				'filter' => 'url',
				'default' => '',
			),
		),
	);
}

function wikiplugin_metatag($data, $params)
{
	$headerlib = TikiLib::lib('header');
	extract($params, EXTR_SKIP);

	if (isset($name)) {
		if (!isset($content)) {
			$content = '';
		}
		$headerlib->add_meta($name,$content);
	} else if (strpos($data, '|') !== FALSE) {
		// split data by lines (trimed whitespace from start and end)
		$lines = preg_split("/\n/", trim($data));

		foreach ($lines as $line) {
			$metaTagAttrib = explode('|', $line);
			//$result .= "<meta name=\"$metaTagAttrib[0]\" content=\"$metaTagAttrib[1]\">\n";
			$headerlib->add_meta(trim($metaTagAttrib[0]),trim($metaTagAttrib[1]));
		}
	} else {
		// just insert the raw data from the plugin body
		$headerlib->add_rawhtml($data);
	}
	return '';
}
