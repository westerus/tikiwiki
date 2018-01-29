<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: modifier.replacei.php 62176 2017-04-10 06:01:52Z drsassafras $

/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty replacei modifier plugin
 *
 * Type:     modifier<br>
 * Name:     replacei<br>
 * Purpose:  Returns a case insensitive replaced string.
 *           Same arguments as PHP str_ireplace function.
 */
function smarty_modifier_replacei($string, $find, $replacement)
{
	return str_ireplace($find, $replacement, $string);
}
